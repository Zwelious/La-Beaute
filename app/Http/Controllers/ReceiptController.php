<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class ReceiptController extends Controller
{
    public function Receipt()
    {
        $id_cust = session('id_cust', Cookie::get('id_cust'));

        if (!$id_cust) {
            return redirect()->route('login');
        }

        $cartProducts = DB::table('keranjang')
            ->join('detail_produk', 'keranjang.ID_PROD', '=', 'detail_produk.ID_PROD')
            ->join('customer', 'keranjang.ID_CUST', '=', 'customer.ID_CUST')
            ->select('keranjang.ID_PROD', 'detail_produk.NAMA_PROD', 'detail_produk.SHADE', 'keranjang.QTY', 'detail_produk.HARGA', 'detail_produk.FOTO_PROD', 'detail_produk.DISKON')
            ->where('keranjang.ID_CUST', '=', $id_cust)
            ->get();

        $total = $cartProducts->reduce(function ($carry, $product) {
            return $carry + ($product->HARGA * $product->QTY);
        }, 0);

        DB::table('transaksi')->insert([
            'ID_CUST' => $id_cust,
            'TANGGAL' => Carbon::now(),
            'TOTAL' => $total,
        ]);

        foreach ($cartProducts as $product) {
            DB::table('detail_transaksi')->insert([
                'ID_PROD' => $product->ID_PROD,
                'HARGA' => $product->HARGA,
                'QTY' => $product->QTY,
            ]);
        }

        // Clear the cart for the customer
        DB::table('keranjang')
            ->where('ID_CUST', '=', $id_cust)
            ->delete();

        $transaction = DB::table('transaksi')
        ->where('ID_CUST', $id_cust)
        ->orderBy('TANGGAL', 'desc')
        ->first();

        $customer = DB::table('customer')->where('ID_CUST', $id_cust)->first();

        Session::put('cartProducts', $cartProducts);

        return view('receipt', compact('cartProducts', 'transaction', 'customer'));
    }
}

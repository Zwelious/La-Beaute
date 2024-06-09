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

        // Store cart products in session
        Session::put('cartProducts', $cartProducts);

        if($cartProducts->isEmpty()){
            return redirect('/');
        }

        // Calculate total price
        $total = $cartProducts->reduce(function ($carry, $product) {
            $discountedPrice = $product->HARGA * (1 - $product->DISKON / 100);
            return $carry + ($discountedPrice * $product->QTY);
        }, 0);

        // Insert transaction into the database
        DB::table('transaksi')->insert([
            'ID_CUST' => $id_cust,
            'TANGGAL' => Carbon::now(),
            'TOTAL' => $total,
        ]);

        // Insert detail transactions into the database
        foreach ($cartProducts as $product) {
            $discountedPrice = $product->DISKON > 0 ? $product->HARGA * (1 - $product->DISKON / 100) : $product->HARGA;

            DB::table('detail_transaksi')->insert([
                'ID_PROD' => $product->ID_PROD,
                'HARGA' => $discountedPrice,
                'QTY' => $product->QTY,
            ]);
        }

        // Delete cart products from the database
        DB::table('keranjang')->where('ID_CUST', '=', $id_cust)->delete();

        // Retrieve transaction details
        $transaction = DB::table('transaksi')
            ->where('ID_CUST', $id_cust)
            ->orderBy('TANGGAL', 'desc')
            ->first();

        // Retrieve customer details
        $customer = DB::table('customer')->where('ID_CUST', $id_cust)->first();

        // Retrieve cart products from session
        $cartProducts = session('cartProducts');

        return view('receipt', compact('cartProducts', 'transaction', 'customer'));
    }
}

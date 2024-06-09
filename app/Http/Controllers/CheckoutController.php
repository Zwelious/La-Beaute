<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;


class CheckoutController extends Controller
{
    public function checkoutSubmit(Request $request)
    {
        $validatedData = $request->validate([
        // Personal information
        'email' => 'required|email',
        'firstName' => 'required',
        'lastName' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'city' => 'required',
        'country' => 'required',

        // Payment information
        'cardholderName' => 'required',
        'cardNumber' => 'required|numeric',
        'expirationDate' => 'required|date_format:m/y',
        'cvv' => 'required|digits:3',
        ]);

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


        return redirect()->route('receipt')->with('success', 'Checkout successful!');
    }

    public function Checkout()
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


        if ($cartProducts->isEmpty()) {
            return redirect('/cart')->with('error', 'Cart is empty. Go to shop to buy our best beauty products!');
        }

        return view('checkout', compact('cartProducts'));
    }

}




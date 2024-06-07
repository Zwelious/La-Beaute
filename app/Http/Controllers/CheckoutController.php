<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CheckoutController extends Controller
{
    public function checkoutSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'cardholderName' => 'required',
            'cardNumber' => 'required|regex:/^\d{16}$/',
            'expirationDate' => 'required|regex:/^(0[1-9]|1[0-2])\/\d{2}$/',
            'cvv' => 'required|regex:/^\d{3}$/',
        ]);

        return redirect()->route('checkout')->with('success', 'Checkout successful!');
    }

    public function Checkout()
    {
        $cartProducts = DB::table('keranjang')
            ->join('detail_produk', 'keranjang.ID_PROD', '=', 'detail_produk.ID_PROD')
            ->join('customer', 'keranjang.ID_CUST', '=', 'customer.ID_CUST')
            ->select('keranjang.ID_PROD', 'detail_produk.NAMA_PROD', 'detail_produk.SHADE', 'keranjang.QTY', 'detail_produk.HARGA', 'detail_produk.FOTO_PROD', 'detail_produk.DISKON')
            ->get();

        return view('checkout', compact('cartProducts'));
    }
    
}




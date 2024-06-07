<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{
    public function Receipt()
    {
        $cartProducts = DB::table('keranjang')
        ->join('detail_produk', 'keranjang.ID_PROD', '=', 'detail_produk.ID_PROD')
        ->join('customer', 'keranjang.ID_CUST', '=', 'customer.ID_CUST')
        ->select('keranjang.ID_PROD', 'detail_produk.NAMA_PROD', 'detail_produk.SHADE', 'keranjang.QTY', 'detail_produk.HARGA', 'detail_produk.FOTO_PROD', 'detail_produk.DISKON')
        ->get();

        return view('receipt', compact('cartProducts'));
    }
}
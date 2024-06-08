<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    public function Cart()
    {
        $id_cust = session('id_cust', Cookie::get('id_cust'));

        if (!$id_cust) {
            return redirect()->route('login')->with('error', "Please Log in first.");
        }

        $cartProducts = DB::table('keranjang')
            ->join('detail_produk', 'keranjang.ID_PROD', '=', 'detail_produk.ID_PROD')
            ->join('customer', 'keranjang.ID_CUST', '=', 'customer.ID_CUST')
            ->select('keranjang.ID_PROD', 'detail_produk.NAMA_PROD', 'detail_produk.SHADE', 'keranjang.QTY', 'detail_produk.HARGA', 'detail_produk.FOTO_PROD', 'detail_produk.DISKON')
            ->where('keranjang.ID_CUST', '=', $id_cust)
            ->get();

        return view('cart', compact('cartProducts'));
    }

    public function updateCart(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');
        $id_cust = session('id_cust', Cookie::get('id_cust'));

        $updated = DB::table('keranjang')
            ->where('ID_PROD', $productId)
            ->where('ID_CUST', $id_cust) // Correctly use the customer ID from session
            ->update(['QTY' => $quantity]);

        if ($updated) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function removeCartItem(Request $request)
    {
        $productId = $request->input('productId');
        $id_cust = session('id_cust', Cookie::get('id_cust'));

        $deleted = DB::table('keranjang')
            ->where('ID_PROD', $productId)
            ->where('ID_CUST', '=', $id_cust)
            ->delete();

        if ($deleted) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}

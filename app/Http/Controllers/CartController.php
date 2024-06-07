<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    public function Cart()
    {
        $cartProducts = DB::table('keranjang')
        ->join('detail_produk', 'keranjang.ID_PROD', '=', 'detail_produk.ID_PROD')
        ->join('customer', 'keranjang.ID_CUST', '=', 'customer.ID_CUST')
        ->select('keranjang.ID_PROD', 'detail_produk.NAMA_PROD', 'detail_produk.SHADE', 'keranjang.QTY', 'detail_produk.HARGA', 'detail_produk.FOTO_PROD', 'detail_produk.DISKON')
        ->get();
        return view('cart', compact('cartProducts'));
    }

    // public function CartRemove()
    // {
    //     $cartRemove = DB::table('keranjang')
    //     ->join('customer', 'keranjang.ID_CUST', '=', 'customer.ID_CUST')
    //     ->select('keranjang.ID_PROD', 'detail_produk.NAMA_PROD', 'detail_produk.SHADE', 'keranjang.QTY', 'detail_produk.HARGA', 'detail_produk.FOTO_PROD', 'detail_produk.DISKON')
    //     ->get();
    //     return view('cart', compact('cartRemove'));
    // }

    // public function CartFavorite()
    // {
    //     $existingWishlistEntry = Wishlist::where('product_id', $productId)
    //         ->where('user_id', Auth::id())
    //         ->first();

    //     $cartFavorite = DB::table('keranjang')
    //     ->join('customer', 'keranjang.ID_CUST', '=', 'customer.ID_CUST')
    //     ->join('detail_produk', 'keranjang.ID_PROD', '=', 'detail_produk.ID_PROD')
    //     ->insert('keranjang.ID_PROD', 'detail_produk.NAMA_PROD', 'detail_produk.SHADE', 'keranjang.QTY', 'detail_produk.HARGA', 'detail_produk.FOTO_PROD', 'detail_produk.DISKON')
    //     ->get();

    //     $wishlist = new Wishlist;
    //     $wishlist->ID_PROD = $cartFavorite->ID_PROD;
    //     $wishlist->user_id = Auth::id();
    //     $wishlist->save();

    //     return view('cart', compact('cartFavorite'));
    //     return response()->json([
    //         'message' => 'Product added to wishlist successfully',
    //     ], 201);
    // }

    public function updateCart(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');

        $updated = DB::table('keranjang')
        ->where('ID_PROD', $productId)
        ->update(['QTY' => $quantity]);

        if ($updated) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function removeCartItem(Request $request)
    {
        $productId = $request->input('productId');

        $deleted = DB::table('keranjang')
            ->where('ID_PROD', $productId)
            ->delete();

        if ($deleted) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}

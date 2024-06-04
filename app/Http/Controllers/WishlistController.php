<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function Wishlist()
    {
        $wishlistProducts = DB::table('wishlist')
        ->join('detail_produk', 'wishlist.ID_PROD', '=', 'detail_produk.ID_PROD')
        ->join('customer', 'wishlist.ID_CUST', '=', 'customer.ID_CUST')
        ->select('wishlist.ID_PROD', 'detail_produk.NAMA_PROD', 'detail_produk.SHADE', 'detail_produk.HARGA', 'detail_produk.FOTO_PROD', 'detail_produk.DISKON', 'detail_produk.DESKRIPSI')
        ->get();
        
        return view('wishlist', compact('wishlistProducts'));
    }
}
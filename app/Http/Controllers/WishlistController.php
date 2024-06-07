<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function Wishlist()
    {
        $id_cust = session('id_cust', Cookie::get('id_cust'));

        if (!$id_cust) {
            return redirect()->route('login');
        }

        // Fetch wishlist products
        $wishlistProducts = DB::table('wishlist')
            ->join('detail_produk', 'wishlist.ID_PROD', '=', 'detail_produk.ID_PROD')
            ->join('customer', 'wishlist.ID_CUST', '=', 'customer.ID_CUST')
            ->select('wishlist.ID_PROD', 'detail_produk.NAMA_PROD', 'detail_produk.SHADE', 'detail_produk.HARGA', 'detail_produk.FOTO_PROD', 'detail_produk.DISKON', 'detail_produk.DESKRIPSI', 'detail_produk.KATEGORI')
            ->where('wishlist.ID_CUST', '=', $id_cust)
            ->get();

        // Get the categories of the wishlist products
        $wishlistCategories = $wishlistProducts->pluck('KATEGORI')->unique();

        // Get recommended products from the same categories that are not in the wishlist
        $recommendedProducts = DB::table('detail_produk')
            ->whereIn('KATEGORI', $wishlistCategories)
            ->whereNotIn('ID_PROD', $wishlistProducts->pluck('ID_PROD'))
            ->select('ID_PROD', 'NAMA_PROD', 'SHADE', 'HARGA', 'FOTO_PROD', 'DISKON', 'DESKRIPSI', 'KATEGORI')
            ->get();

        // dd($recommendedProducts);

        return view('wishlist', compact('wishlistProducts', 'recommendedProducts'));
    }
}

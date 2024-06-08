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
            return redirect()->route('login')->with('error', "Please Log in first.");
        }

        $wishlistProducts = DB::table('wishlist')
            ->leftJoin('detail_produk', 'wishlist.ID_PROD', '=', 'detail_produk.ID_PROD')
            ->join('customer', 'wishlist.ID_CUST', '=', 'customer.ID_CUST')
            ->select('wishlist.ID_PROD', 'detail_produk.NAMA_PROD', 'detail_produk.SHADE', 'detail_produk.HARGA', 'detail_produk.FOTO_PROD', 'detail_produk.DISKON', 'detail_produk.DESKRIPSI', 'detail_produk.KATEGORI')
            ->get();

        if ($wishlistProducts->isEmpty()) {
            $recommendedProducts = DB::table('detail_transaksi as dt')
            ->join('DETAIL_PRODUK as dp', 'dt.ID_PROD', '=', 'dp.ID_PROD')
            ->select(
                'dt.ID_PROD',
                'dp.NAMA_PROD',
                'dp.FOTO_PROD',
                'dp.SHADE',
                'dp.DESKRIPSI',
                'dp.HARGA',
                'dp.DISKON',
                'dp.KATEGORI',
                'dp.STOCK',
                DB::raw('COUNT(*) as total_sales')
            )
            ->groupBy('dt.ID_PROD', 'dp.NAMA_PROD', 'dp.FOTO_PROD', 'dp.SHADE', 'dp.DESKRIPSI', 'dp.HARGA', 'dp.DISKON', 'dp.KATEGORI', 'dp.STOCK')
            ->orderByDesc('total_sales')
            ->limit(7)
            ->get();

            return view('wishlist', compact('wishlistProducts', 'recommendedProducts'));
        }
        else
        {
            $wishlistCategories = $wishlistProducts->pluck('KATEGORI')->unique();

            $recommendedProducts = DB::table('detail_produk')
                ->whereIn('KATEGORI', $wishlistCategories)
                ->whereNotIn('ID_PROD', $wishlistProducts->pluck('ID_PROD'))
                ->select('ID_PROD', 'NAMA_PROD', 'SHADE', 'HARGA', 'FOTO_PROD', 'DISKON', 'DESKRIPSI', 'KATEGORI')
                ->get();

            return view('wishlist', compact('wishlistProducts', 'recommendedProducts'));
        }
    }

    public function removeFromWishlist(Request $request)
    {
        $productId = $request->input('product_id');
        $id_cust = session('id_cust', Cookie::get('id_cust'));

        if (!$id_cust) {
            return redirect()->route('login')->with('error', "Please Log in first.");
        }

        DB::table('wishlist')
            ->where('ID_PROD', $productId)
            ->where('ID_CUST', $id_cust)
            ->delete();

        return back()->with('success', 'Product removed from wishlist.');
    }
}

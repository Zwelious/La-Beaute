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

        $dataProducts = DB::table('detail_produk as dp')
            ->join(DB::raw('(SELECT NAMA_PROD, MIN(ID_PROD) as min_id FROM DETAIL_PRODUK GROUP BY NAMA_PROD) as distinct_names'),
                'dp.ID_PROD', '=', 'distinct_names.min_id')
            ->select('dp.ID_PROD', 'dp.NAMA_PROD', 'dp.SHADE', 'dp.DESKRIPSI', 'dp.HARGA', 'dp.DISKON', 'dp.KATEGORI', 'dp.STOCK', 'dp.FOTO_PROD')
            ->get();

        $recommendedProducts = DB::table('detail_transaksi')
            ->select('ID_PROD', DB::raw('COUNT(*) as total_sales'))
            ->groupBy('ID_PROD')
            ->orderByDesc('total_sales')
            ->limit(7)
            ->get();

        $recommendedProductIds = $recommendedProducts->pluck('ID_PROD');

        $recommendedProducts = $dataProducts->whereIn('ID_PROD', $recommendedProductIds)
        ->whereNotIn('ID_PROD', $cartProducts->pluck('ID_PROD')->toArray());

        return view('cart', compact('cartProducts', 'recommendedProducts'));
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

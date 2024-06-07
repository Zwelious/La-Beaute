<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class ShopDetailsController extends Controller
{
    protected $shopController;

    public function __construct(ShopController $shopController)
    {
        $this->shopController = $shopController;
    }

    public function ShopDetails($id_prod)
    {
        $product = $this->shopController->getProductById($id_prod);

        if (!$product) {
            return abort(404, 'Product not found.');
        }

        $dataProducts = DB::table('detail_produk')
        ->select('ID_PROD', 'NAMA_PROD', 'SHADE', 'DESKRIPSI', 'HARGA', 'DISKON', 'KATEGORI', 'STOCK', 'FOTO_PROD')
        ->get();

        $similarProducts = DB::table('detail_produk as dp')
        ->join(DB::raw('(SELECT NAMA_PROD, MIN(ID_PROD) as min_id FROM DETAIL_PRODUK GROUP BY NAMA_PROD) as distinct_names'),
            'dp.ID_PROD', '=', 'distinct_names.min_id')
        ->select('dp.ID_PROD', 'dp.NAMA_PROD', 'dp.SHADE', 'dp.DESKRIPSI', 'dp.HARGA', 'dp.DISKON', 'dp.KATEGORI', 'dp.STOCK', 'dp.FOTO_PROD')
        ->where('dp.KATEGORI', $product->KATEGORI)
        ->get();


        return view('shop-detail', ['product' => $product], compact('dataProducts', 'similarProducts'));
    }
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'nama_prod' => 'required|string',
            'shade' => 'required|string',
            'count' => 'required|integer|min:1',
        ]);

        $product = DB::table('detail_produk')
        ->where('NAMA_PROD', $validated['nama_prod'])
        ->where('SHADE', $validated['shade'])
        ->first();

        if(!$product){
            return back()->with('error', 'Please select a shade.');
        }

        $id_cust = session('id_cust', Cookie::get('id_cust'));

        if (!$id_cust) {
            return redirect()->route('login');
        }

        DB::table('KERANJANG')->insert([
            'ID_CUST' => $id_cust,
            'ID_PROD' => $product->ID_PROD,
            'NAMA_PROD' => $product->NAMA_PROD,
            'HARGA' => $product->DISKON > 0 ? $product->HARGA - ($product->HARGA * $product->DISKON) / 100 : $product->HARGA,
            'SHADE' => $validated['shade'],
            'QTY' => $validated['count'],
        ]);

        // Redirect back with a success message
        return redirect('/cart')->with('success', 'Product added to cart successfully!');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\DB;

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

        return view('shop-detail', ['product' => $product], compact('dataProducts'));
    }
}

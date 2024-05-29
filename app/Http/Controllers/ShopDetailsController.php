<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;

class ShopDetailsController extends Controller
{
    protected $shopController;

    public function __construct(ShopController $shopController)
    {
        $this->shopController = $shopController;
    }

    public function ShopDetails($id_prod)
    {
        $products = $this->shopController->dataProducts;

        $product = $products->firstWhere('ID_PROD', $id_prod);

        return view('shop-detail', ['product' => $product]);
    }
}

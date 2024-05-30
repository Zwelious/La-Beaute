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
        $product = $this->shopController->getProductById($id_prod);

        if (!$product) {
            return abort(404, 'Product not found.');
        }

        return view('shop-detail', ['product' => $product]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function add(Request $request)
    {
        try {
            $productId = $request->input('product_id');
            // $userId = Auth::id(); // Ensure the user is authenticated

            // if (!$userId) {
            //    return response()->json(['success' => false, 'message' => 'User not authenticated'], 401);
            //}

            // Find the product details
            $product = DB::table('detail_produk')->where('ID_PROD', $productId)->first();

            if (!$product) {
                return response()->json(['success' => false, 'message' => 'Product not found'], 404);
            }

            // Check if the product is already in the cart
            $cartItem = DB::table('keranjang')
                ->where('ID_PROD', $productId)
                // ->where('ID_CUST', $userId)
                ->first();

            if ($cartItem) {
                // Update the quantity if the product is already in the cart
                DB::table('keranjang')
                    ->where('ID_PROD', $productId)
                    // ->where('ID_CUST', $userId)
                    ->update(['QTY' => $cartItem->QTY + 1]);
            } else {
                // Add the new product to the cart
                DB::table('keranjang')->insert([
                   // 'ID_CUST' => $userId,
                    'ID_PROD' => $productId,
                    'QTY' => 1
                ]);
            }

            return response()->json(['success' => true, 'message' => 'Product added to cart successfully']);
        } catch (\Exception $e) {
            Log::error('Failed to add product to cart: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to add product to cart'], 500);
        }
    }
}
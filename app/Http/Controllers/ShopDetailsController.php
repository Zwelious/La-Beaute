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
        // Validate the request data
    $validated = $request->validate([
        'nama_prod' => 'required|string',
        'shade' => 'required|string',
        'count' => 'required|integer|min:1',
    ]);

    // Retrieve the product details
    $product = DB::table('detail_produk')
        ->where('NAMA_PROD', $validated['nama_prod'])
        ->where('SHADE', $validated['shade'])
        ->first();

    // If the product is not found, return with an error message
    if (!$product) {
        return back()->with('error', 'Please select a valid shade.');
    }

    // Get the customer ID from session or cookie
    $id_cust = session('id_cust', Cookie::get('id_cust'));

    // Redirect to login if the customer is not logged in
    if (!$id_cust) {
        return redirect()->route('login')->with('error', "Please log in first.");
    }

    // Check if the product is already in the cart
    $existingCartItem = DB::table('KERANJANG')
        ->where('ID_CUST', $id_cust)
        ->where('ID_PROD', $product->ID_PROD)
        ->where('SHADE', $validated['shade'])
        ->first();

    if ($existingCartItem) {
        // If the product is already in the cart, update the quantity
        DB::table('keranjang')
            ->where('ID_CUST', $id_cust)
            ->where('ID_PROD', $product->ID_PROD)
            ->where('SHADE', $validated['shade'])
            ->update([
                'QTY' => $existingCartItem->QTY + $validated['count'],
            ]);

        return redirect('/cart')->with('success', 'Product quantity updated in cart successfully!');
    } else {
        // Add product to cart if it is not already present
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

    public function addToWishlist(request $request){
        // Validate the request data
    $validated = $request->validate([
        'nama_prod' => 'required|string',
    ]);

    // Retrieve the product details
    $product = DB::table('detail_produk')
        ->where('NAMA_PROD', $validated['nama_prod'])
        ->first();

    // Get the customer ID from session or cookie
    $id_cust = session('id_cust', Cookie::get('id_cust'));

    // Redirect to login if the customer is not logged in
    if (!$id_cust) {
        return redirect()->route('login')->with('error', "Please log in first.");
    }

    // Check if the product is already in the wishlist
    $existingWishlistItem = DB::table('wishlist')
        ->where('ID_CUST', $id_cust)
        ->where('ID_PROD', $product->ID_PROD)
        ->first();

    if ($existingWishlistItem) {
        // Redirect back with an error message if the product is already in the wishlist
        return redirect('/wishlist')->with('error', "This product is already in your wishlist.");
    }

    // Add product to wishlist
    DB::table('wishlist')->insert([
        'ID_CUST' => $id_cust,
        'ID_PROD' => $product->ID_PROD,
        'NAMA_PROD' => $product->NAMA_PROD,
        'HARGA' => $product->DISKON > 0 ? $product->HARGA - ($product->HARGA * $product->DISKON) / 100 : $product->HARGA,
    ]);

    // Redirect back with a success message
    return redirect('/wishlist')->with('success', 'Product added to wishlist successfully!');
    }
}

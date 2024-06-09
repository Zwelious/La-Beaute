<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgetPassController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopDetailsController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AdminTransController;
use App\Http\Controllers\AdminShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/', [HomeController::class, 'Home']);

Route::get('/login', [LoginController::class, 'Login'])->name('login');
Route::post('/login', [LoginController::class, 'LoginAction'])->name('login');

Route::get('/register', [RegisterController::class, 'Register'])->name('register');
Route::post('/register', [RegisterController::class, 'RegisterAction'])->name('register');

Route::get('/forget', [ForgetPassController::class, 'ForgetPass'])->name('forget');

Route::post('/forget', [ForgetPassController::class, 'resetPassword'])->name('reset-pass');

Route::get('/cart', [CartController::class, 'Cart']);
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update-cart');
Route::post('/remove-cart', [CartController::class, 'removeCartItem'])->name('remove-cart');

Route::get('/checkout', [CheckoutController::class, 'Checkout']);

Route::post('/checkout', [CheckoutController::class, 'CheckoutSubmit'])->name('checkout');

Route::get('/wishlist', [WishlistController::class, 'Wishlist']);

Route::get('/shop', [ShopController::class, 'Shop'])->name('shop');

Route::post('/shop', [ShopController::class, 'shopSearch'])->name('search');

Route::get('/shop-{category}', [ShopController::class, 'showByCategory'])->name('shop-category');

Route::get('/shop/{id_prod}', [ShopDetailsController::class, 'ShopDetails'])->name('shop-details');

Route::post('/shop/{id_prod}', [ShopDetailsController::class, 'addToCart'])->name('addtocart');

Route::post('/shop-wishlist', [ShopDetailsController::class, 'addToWishlist'])->name('addtowishlist');

Route::get('/contact', [ContactController::class, 'Contact']);

Route::get('/receipt', [ReceiptController::class, 'Receipt'])->name('receipt');

Route::post('/logout', [LoginController::class, 'Logout'])->name('logout');

Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');

Route::get('/admin', [AdminTransController::class, 'AdminTrans']);

Route::get('/admin-contact', [AdminTransController::class, 'AdminContact']);

Route::get('/admin-shop', [AdminTransController::class, 'AdminShop']);
Route::post('/admin-shop-add', [AdminTransController::class, 'addProduct'])->name('addProduct');
Route::post('/admin-shop-edit', [AdminTransController::class, 'editProduct'])->name('editProduct');

Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');

Route::post('/contact.store', [ContactController::class, 'store'])->name('contact.store');

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

// Route::post('/register', 'Auth\RegisterController@register')->name('register');

// Route::post('/register', 'AuthController@register')->name('register');

Route::get('/forget', [ForgetPassController::class, 'ForgetPass'])->name('forget');

Route::get('/cart', [CartController::class, 'Cart']);
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update-cart');
Route::post('/delete-cart', [CartController::class, 'removeCartItem'])->name('delete-cart');

Route::get('/checkout', [CheckoutController::class, 'Checkout']);

Route::post('/checkout', [CheckoutController::class, 'CheckoutSubmit'])->name('checkout');

Route::get('/wishlist', [WishlistController::class, 'Wishlist']);

Route::get('/shop', [ShopController::class, 'Shop'])->name('shop');

Route::post('/shop', [ShopController::class, 'shopSearch'])->name('search');

Route::get('/shop/{id_prod}', [ShopDetailsController::class, 'ShopDetails'])->name('shop-details');

Route::post('/shop/{id_prod}', [ShopDetailsController::class, 'addToCart'])->name('addtocart');

Route::get('/testimonials', [TestimonialController::class, 'Testimonial']);

Route::get('/admin-dashboard', [AdminTransController::class, 'AdminTrans']);

Route::get('/admin-shop', [AdminShopController::class, 'AdminShop']);

Route::get('/contact', [ContactController::class, 'Contact']);

Route::get('/receipt', [ReceiptController::class, 'Receipt']);

Route::post('/logout', [LoginController::class, 'Logout'])->name('logout');

Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

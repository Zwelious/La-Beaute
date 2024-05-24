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

Route::get('/login', [LoginController::class, 'Login']);
Route::post('/login', [LoginController::class, 'LoginAction']);

Route::get('/register', [RegisterController::class, 'Register']);

Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::post('/register', 'AuthController@register')->name('register');

Route::get('/forget', [ForgetPassController::class, 'ForgetPass']);

Route::get('/cart', [CartController::class, 'Cart']);

Route::get('/checkout', [CheckoutController::class, 'Checkout']);

Route::get('/wishlist', [WishlistController::class, 'Wishlist']);

Route::get('/shop', [ShopController::class, 'Shop']);

Route::get('/shop-details', [ShopDetailsController::class, 'ShopDetails']);

Route::get('/testimonials', [TestimonialController::class, 'Testimonial']);

Route::get('/admin-dashboard', [AdminTransController::class, 'AdminTrans']);

Route::get('/admin-shop', [AdminShopController::class, 'AdminShop']);

Route::get('/contact', [ContactController::class, 'Contact']);

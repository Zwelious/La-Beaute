<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/register', [RegisterController::class, 'Register']);

Route::get('/forget', [ForgetPassController::class, 'ForgetPass']);

Route::get('/cart', [CartController::class, 'Cart']);

Route::get('/checkout', [CheckoutController::class, 'Checkout']);

Route::get('/wishlist', [WishlistController::class, 'Wishlist']);

<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/wishlist', function () {
    return view('wishlist');
});
  
Route::get('/cart', function () {
    return view('cart');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::get('/forget', function () {
    return view('forget');
});

Route::get('/register1', function () {
    return view('register1');
});
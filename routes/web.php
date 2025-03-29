<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
}); 

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/history', function () {
    return view('history');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/detailproduct', function () {
    return view('detailproduct');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/product', function () {
    $response = Http::get("http://petly.test:8080/api/products");
    
    return view('product', ['products' => $response]);
});

Route::get('/courier-info', function () {
    return view('courier/courierInfo');
});

Route::get('/parcel-tracking', function () {
    return view('courier/parcelTracking');
});

Route::get('/admin/dashboard', function () {
    return view('admin/dashboard'); 
});

Route::get('/admin/order', function () {
    return view('admin/order');
});

Route::get('/admin/product', function () {
    return view('admin/product');
});

Route::get('/bank', function () {
    return view('bank');
});

Route::get('/pet', function () {
    return view('pet');
});

Route::get('/theme', function () {
    return view('theme');
});

use App\Http\Controllers\loginController;

Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [loginController::class, 'login'])->name('login.process');


use App\Http\Controllers\registerController;

Route::get('/register', [registerController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [registerController::class, 'register'])->name('register.process');


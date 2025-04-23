<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;


Route::get('/', function () {
    return view('home');
})->name('home');

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

Route::get('/detailproduct/{id}', function ($id) {
    $response = Http::get("http://petly.test:8080/api/products/{$id}");

    return view('detailproduct', ['product' => $response->json()['data']]);
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

Route::get('admin/product', function () {
    $response = Http::get("http://petly.test:8080/api/products");
    
    return view('admin/product', ['products' => $response]);
});

Route::get('/courier-info', function () {
    return view('courier/courierInfo');
});

Route::get('/parcel-tracking', function () {
    return view('courier/parcelTracking');
});

Route::get('/admin/dashboard', function () {
    return view('admin/dashboard'); 
})->name('home-admin');

Route::get('/admin/order', function () {
    return view('admin/order');
});

Route::get('/admin/addproduct', function () {
    return view('admin/addproduct');
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
Route::post('/login', [loginController::class, 'login']);

use App\Http\Controllers\registerController;

Route::get('/register', [registerController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [registerController::class, 'register']);

use App\Http\Controllers\ProductCartController;
Route::post('/cart/add', [ProductCartController::class, 'hello'])->name('cart.add');

use App\Http\Controllers\addProductController;
Route::get('/admin/product/add', [addProductController::class, 'showForm'])->name('product.add');
Route::post('/admin/product/add', [addProductController::class, 'store'])->name('product.store');
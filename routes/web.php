<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;


Route::get('/', function () {
    $response = Http::get("http://petly.test:8080/api/products");
    
    return view('/home', ['products' => $response]);
})->name('home');

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/history', function () {
    return view('history');
});

Route::get('/aboutus', function () {
    session()->flush();
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

Route::get('/admin', function () {
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
Route::post('/cart', [ProductCartController::class, 'store'])->name('cart.add');

use App\Http\Controllers\CartsController;
Route::get('/cart', [CartsController::class, 'index'])->name('cart.index');
Route::delete('/cart/{id}', [CartsController::class, 'destroy'])->name('cart.destroy');

use App\Http\Controllers\ProductsController;
Route::delete('/admin/product/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');

use App\Http\Controllers\ProfileController;
Route::get('/profile', [ProfileController::class, 'getProfile']);
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

use App\Http\Controllers\LogoutController;
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

use App\Http\Controllers\HistoryController;
Route::get('/history', [HistoryController::class, 'getHistory']);

use App\Http\Controllers\addProductController;

Route::get('/admin/product/add', [addProductController::class, 'showForm'])->name('product.add');
Route::post('/admin/product/add', [addProductController::class, 'store'])->name('product.store');

use App\Http\Controllers\CheckoutController;
Route::post('/checkout/add', [CheckoutController::class, 'storeCheckout'])->name('checkout.store');

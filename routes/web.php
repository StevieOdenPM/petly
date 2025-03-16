<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/product', function () {
    return view('product');
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

Route::get('/product', function () {
    $response = Http::get("http://petly.test/api/products");
    
    return view('product', ['products' => $response]);
});
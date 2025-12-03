<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ProductController;

// Route untuk homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk produk
Route::get('/product', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('products.show');

// Route untuk filter by category produk
Route::get('/product/category/{slug}', [ProductController::class, 'byCategory'])->name('products.byCategory');




Route::get('/profile', function () {
    return view('profile.index');
});

Route::get('/cart', function () {
    return view('cart.index');
});


Route::get('/checkout', function () {
    return view('checkout.index');
});


Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/category/{slug}', [CategoriesController::class, 'show'])->name('categories.show');

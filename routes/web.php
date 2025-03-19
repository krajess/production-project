<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopOwnerController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/shops', [ShopController::class, 'index'])->name('shops.index');
Route::get('/shops/{shop}', [ShopController::class, 'show'])->name('shops.show');

Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/businesses', [AdminController::class, 'shops'])->name('admin.shops');
    Route::get('/admin/applications', [AdminController::class, 'applications'])->name('admin.applications');
    Route::get('/admin/applications/{application}', [ApplicationController::class, 'show'])->name('admin.show-application');
    Route::patch('/applications/{application}/status', [ApplicationController::class, 'updateStatus'])->name('applications.updateStatus');
    Route::patch('/admin/businesses/{shop}/visible', [AdminController::class, 'ShopVisible'])->name('admin.shops.ShopVisible');
});

Route::middleware(['auth', 'can:is-business-owner'])->group(function () {
    Route::get('/shop_dashboard', [ShopOwnerController::class, 'index'])->name('shop_owner.index');
    Route::get('/shop_dashboard/{shop}', [ShopOwnerController::class, 'edit'])->name('shop_owner.edit');
    Route::patch('/shop_dashboard/{shop}', [ShopOwnerController::class, 'update'])->name('shop_owner.update');

    Route::get('/shops/{shop}/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/shops/{shop}/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/shops/{shop}/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/shops/{shop}/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/shops/{shop}/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
Route::get('/shops/{shop}/products/{product}', [ProductController::class, 'show'])->name('shops.products.show');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::middleware('auth')->group(function () {
    Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('applications/create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('applications', [ApplicationController::class, 'store'])->name('applications.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopOwnerController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/shops', [ShopController::class, 'index'])->name('shops.index');
//Route::get('/shops/create', [ShopController::class, 'create'])->name('shops.create');
//Route::post('/shops', [ShopController::class, 'store'])->name('shops.store');
Route::get('/shops/{shop}', [ShopController::class, 'show'])->name('shops.show');
//Route::get('/shops/{shop}/edit', [ShopController::class, 'edit'])->name('shops.edit');
//Route::patch('/shops/{shop}', [ShopController::class, 'update'])->name('shops.update');
//Route::delete('/shops/{shop}', [ShopController::class, 'destroy'])->name('shops.destroy');

Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/businesses', [AdminController::class, 'shops'])->name('admin.shops');
});

Route::middleware(['auth', 'can:is-business-owner'])->group(function () {
    Route::get('/shop_dashboard', [ShopOwnerController::class, 'index'])->name('shop_owner.index');
});

Route::middleware('auth')->group(function () {
    Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('applications/create', [ApplicationController::class, 'create'])->name('applications.create');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

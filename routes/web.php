<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VendorOwnerController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/vendors', [VendorController::class, 'index'])->name('vendors.index');
Route::get('/vendors/{vendor}', [VendorController::class, 'show'])->name('vendors.show');

Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/vendors', [AdminController::class, 'vendors'])->name('admin.vendors');
    Route::get('/admin/applications', [AdminController::class, 'applications'])->name('admin.applications');
    Route::get('/admin/applications/{application}', [ApplicationController::class, 'show'])->name('admin.show-application');
    Route::patch('/applications/{application}/status', [ApplicationController::class, 'updateStatus'])->name('applications.updateStatus');
    Route::patch('/admin/vendors/{vendor}/visible', [AdminController::class, 'VendorVisible'])->name('admin.vendors.VendorVisible');
});

Route::middleware(['auth', 'can:is-vendor-owner'])->group(function () {
    Route::get('/vendor_dashboard', [VendorOwnerController::class, 'index'])->name('vendor_owner.index');
    Route::get('/vendor_dashboard/{vendor}', [VendorOwnerController::class, 'edit'])->name('vendor_owner.edit');
    Route::patch('/vendor_dashboard/{vendor}', [VendorOwnerController::class, 'update'])->name('vendor_owner.update');

    Route::get('/vendor_dashboard/{vendor}/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/vendor_dashboard/{vendor}/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/vendor_dashboard/{vendor}/products', [ProductController::class, 'owner_view'])->name('products.owner_view');
    Route::get('/vendor_dashboard/{vendor}/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/vendor_dashboard/{vendor}/products/{product}', [ProductController::class, 'update'])->name('products.update');
});
Route::get('/vendors/{vendor}/products/{product}', [ProductController::class, 'show'])->name('vendors.products.show');

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

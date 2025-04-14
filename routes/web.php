<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VendorOwnerController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PurchaseHistoryController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/vendors', [VendorController::class, 'index'])->name('vendors.index');
Route::get('/vendors/{vendor}', [ProductController::class, 'index'])->name('products.show_products');
Route::get('/vendors/{vendor}/products/{product}', [ProductController::class, 'show'])->name('vendors.products.show');
Route::get('/vendors/{vendor}/search', [ProductController::class, 'search'])->name('vendors.products.search');



Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/vendors', [AdminController::class, 'vendors'])->name('admin.vendors');
    Route::get('/admin/applications', [AdminController::class, 'applications'])->name('admin.applications');
    Route::get('/admin/applications/{application}', [ApplicationController::class, 'show'])->name('admin.show-application');
    Route::patch('/applications/{application}/status', [ApplicationController::class, 'updateStatus'])->name('applications.updateStatus');
    Route::patch('/admin/vendors/{vendor}/visible', [AdminController::class, 'VendorVisible'])->name('admin.vendors.VendorVisible');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.edit_users');
    Route::patch('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::get('/admin/vendors/{vendor}/edit', [AdminController::class, 'editVendor'])->name('admin.edit_vendor');
    Route::patch('/admin/vendors/{vendor}', [AdminController::class, 'updateVendor'])->name('admin.update_vendor');
});

Route::middleware(['auth', 'can:is-vendor-owner'])->group(function () {
    Route::get('/vendor-dashboard', [VendorOwnerController::class, 'index'])->name('vendor_owner.index');
    Route::get('/vendor-dashboard/{vendor}', [VendorOwnerController::class, 'edit'])->name('vendor_owner.edit');
    Route::patch('/vendor-dashboard/{vendor}', [VendorOwnerController::class, 'update'])->name('vendor_owner.update');
    Route::get('/vendor-dashboard/{vendor}/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/vendor-dashboard/{vendor}/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/vendor-dashboard/{vendor}/products', [ProductController::class, 'manage_products'])->name('products.manage_products');
    Route::get('/vendor-dashboard/{vendor}/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/vendor-dashboard/{vendor}/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/vendor/{vendor}/preview', [VendorController::class, 'preview'])->name('vendor_owner.preview');
    Route::delete('/vendor-dashboard/{vendor}/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/vendor/{vendor}/stripe/dashboard', [VendorController::class, 'stripe_dashboard'])->name('vendor.stripe.dashboard');
    Route::delete('/vendor-dashboard/{vendor}/products/{product}/images', [ProductController::class, 'remove_images'])->name('products.remove_images');
    Route::get('/vendor-dashboard/{vendor}/stripe/link', [VendorController::class, 'connectStripeAcc'])->name('vendor.stripe.link');
});

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/purchase_history', [PurchaseHistoryController::class, 'index'])->name('purchase.history');
    Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('applications/create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('applications', [ApplicationController::class, 'store'])->name('applications.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/checkout/{vendor}/{product}', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::get('/vendor/stripe/callback', [VendorController::class, 'handleStripeCallback'])->name('vendor.stripe.callback');

    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/fail', function () {return view('checkout.fail');})->name('checkout.fail');
});

require __DIR__.'/auth.php';

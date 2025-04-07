<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::define('is-admin', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('is-vendor-owner', function (User $user) {
            return $user->is_vendor_owner;
        });

        Gate::define('is-vendor-manager', function (User $user) {
            return $user->is_vendor_manager;
        });

        Gate::define('is-customer', function (User $user) {
            return $user->is_customer;
        });

        Gate::define('view-vendor', function (User $user, Vendor $vendor) {
            return $user->is_admin || $user->id === $vendor->owner_id;
        });

        View::composer('layouts.navigation', function ($view) {
            $appSent = Application::where('user_id', Auth::id())->exists();
            $view->with('appSent', $appSent);
        });

        Gate::define('delete-product', function (User $user, Product $product) {
            return $user->is_admin || $user->id === $product->vendor->owner_id;
        });
    }
}

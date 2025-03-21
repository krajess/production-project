<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Shop;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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

        Gate::define('is-business-owner', function (User $user) {
            return $user->is_business_owner;
        });

        Gate::define('is-business-manager', function (User $user) {
            return $user->is_business_manager;
        });

        Gate::define('is-customer', function (User $user) {
            return $user->is_customer;
        });

        Gate::define('view-shop', function (User $user, Shop $shop) {
            return $user->is_admin || $user->id === $shop->owner_id;
        });

        View::composer('layouts.navigation', function ($view) {
            $appSent = Application::where('user_id', Auth::id())->exists();
            $view->with('appSent', $appSent);
        });
    }
}

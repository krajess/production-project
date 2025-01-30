<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
    }
}

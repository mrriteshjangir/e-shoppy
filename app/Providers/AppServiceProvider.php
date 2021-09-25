<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// use schema
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Add this line
        Schema::defaultStringLength(191);
    }
}

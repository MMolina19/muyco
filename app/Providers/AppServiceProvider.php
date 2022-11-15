<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot() {
        view()->share('siteTitle', 'muebleyconfort.com.ar');
        view()->share('sinceYear', '2006');
        view()->share('currentYear', date("Y"));
        Paginator::useBootstrap();
    }
}

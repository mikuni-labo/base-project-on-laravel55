<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * utf8mb4_general_ciへの対応
         */
        \Schema::defaultStringLength(191);

        /**
         * 特定の環境と条件でHttps接続を強制させる
         */
        if ( env('SESSION_SECURE_COOKIE', false) ) {
            \URL::forceScheme('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

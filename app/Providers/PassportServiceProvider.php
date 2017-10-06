<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class PassportServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication
     *
     * @return void
     */
    public function boot()
    {
        Passport::routes();
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));

        Passport::tokensCan([
            '*'             => 'All grants',
            'user-get'      => 'Get user',
            'user-get-all'  => 'Get all users',
            'user-create'   => 'Create user',
            'user-update'   => 'Update user',
            'user-delete'   => 'Delete user',
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Passport::ignoreMigrations();
    }

}

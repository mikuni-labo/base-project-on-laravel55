<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * prefix: /
 * middleware: web
 */
Route::group([], function() {
    Route::get('/',         'HomeController')->name('home');
    Route::get('phpinfo',   'PhpinfoController')->name('phpinfo');

    /**
     * Application Auth
     */
    Auth::routes();

    /**
     * Passport
     */
    Route::group([
        'prefix'    => 'passport',
        'namespace' => 'Passport',
    ], function() {
        Route::get( '/',                 'IndexController')->name('passport');

        Route::group([
            'prefix'    => 'oauth',
            'namespace' => 'Oauth',
        ], function() {
            Route::get( 'test',          'TestController')->name('passport.oauth.test');
            Route::get( 'callback',      'CallbackController')->name('passport.oauth.callback');
        });
    });

    /**
     * Test
     */
    Route::group([
        'prefix'    => 'test',
        'namespace' => 'Test',
    ], function() {
        Route::get( 'render_mailable',   'RenderMailableController')->name('test.render_mailable');
    });
});

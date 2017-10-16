<?php

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
     * GitHub
     */
    Route::group([
        'prefix'    => 'socialite/{provider}',
        'namespace' => 'Socialite',
    ], function() {
        Route::get( '/',                 'RedirectController')->name('socialite');
        Route::get( 'callback',          'CallbackController')->name('socialite.callback');
    });

    /**
     * Test
     */
    Route::group([
        'prefix'    => 'test',
        'namespace' => 'Test',
    ], function() {
        Route::get( 'render_mailable',   'RenderMailableController')->name('test.render_mailable');
        Route::get( 'notification',      'NotificationController')->name('test.notification');
        Route::get( 'qrcode',            'QrcodeController')->name('test.qrcode');
        Route::get( 'pivot',             'PivotController')->name('test.pivot');
    });
});

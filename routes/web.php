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
    Route::group([
        'prefix'    => 'auth',
        'namespace' => 'Auth',
    ], function() {
        Route::group([
            'prefix'    => 'user',
            'namespace' => 'User',
        ], function() {
            Route::get( '/',      'GetController')->name('auth.user');
            Route::put( '/',      'ModifyController');
        });
    });

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
        Route::get( '/',                 'IndexController')->name('test');
        Route::get( 'vue',               'VueController');
        Route::get( 'render_mailable',   'RenderMailableController');
        Route::get( 'notification',      'NotificationController');
        Route::get( 'qrcode',            'QrcodeController');
        Route::get( 'pivot',             'PivotController');
        Route::get( 'morph',             'MorphController');
        Route::get( 'carbon',            'CarbonController');
        Route::get( 'collection',        'CollectionController');
        Route::get( 'exception',         'ExceptionController');
        Route::get( 'helper',            'HelperController');
        Route::get( 'php7',              'Php7Controller');
        Route::get( 'relation',          'RelationController');

        /**
         * デザインパターン学習
         */
        $prefix = 'design_pattern';
        Route::group([
            'prefix'    => $prefix,
            'namespace' => studly_case($prefix),
        ], function() {

            /**
             * イテレータパターン
             */
            $prefix = 'iterator';
            Route::group([
                'prefix'    => $prefix,
                'namespace' => studly_case($prefix) . 'Pattern',
            ], function() {
                Route::get( '1',     'IteratorController');
                Route::get( '2',     'Iterator2Controller');
            });

        });
    });

});

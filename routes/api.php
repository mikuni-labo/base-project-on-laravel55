<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * prefix: api
 * middleware: api
 */
Route::group([
    'prefix'    => '',
    'namespace' => 'Api',
], function () {
    /**
     * テスト用のクライアント認証ミドルウェアを試すエンドポイント（いずれ削除）
     */
    Route::get('client', function () {
        return response()->json([
            'result' => true,
        ]);
    })->middleware('client');

    /**
     * ティーポット実装
     */
    Route::get('teapot',  'TeapotController');

    /**
     * v1
     */
    Route::group([
        'prefix'    => 'v1',
        'namespace' => studly_case('v1'),
    ], function () {
        /**
         * users
         */
        Route::group([
            'prefix'    => 'users',
            'namespace' => 'Users',
        ], function () {
            Route::get('/',         'IndexController');
            Route::post('/',        'CreateController');
            Route::patch('/{id}',   'RestoreController');

            Route::group([
                'prefix'    => '{user}',
            ], function () {
                Route::get('/',     'GetController');
                Route::put('/',     'UpdateController');
                Route::delete('/',  'DeleteController');
            });
        });

        /**
         * tests
         */
        Route::group([
            'prefix' => 'tests',
        ], function () {
            Route::get('/',        'TestController');
        });
    });
});

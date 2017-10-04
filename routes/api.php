<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

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
Router::group([
    'prefix'    => '',
    'namespace' => 'Api',
], function () {
    /**
     * テスト用のクライアント認証ミドルウェアを試すエンドポイント（いずれ削除）
     */
    Route::get('client', function (Request $request) {
        return response()->json([
            'result' => true,
        ]);
    })->middleware('client');

    /**
     * v1
     */
    Router::group([
        'prefix'    => 'v1',
        'namespace' => studly_case('v1'),
    ], function () {
        /**
         * tests
         */
        Router::group([
            'prefix' => "tests",
        ], function () {
            Router::get('/', 'TestController');
        });
    });
});

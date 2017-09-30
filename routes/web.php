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

Route::get('/',         'HomeController')->name('home');
Route::get('phpinfo',   'TestController@phpinfo')->name('phpinfo');

/**
 * Auth
 */
Auth::routes();

/**
 * Passport Client Test.
 */
Route::view('passport', 'passport')->name('passport');

Route::get('passport/oauth', function () {                // 利用側アプリのOAuth認証テスト用のURL
    $query = http_build_query([
        'client_id'     => 21,                            // 申請先アプリ内で登録済みのクライアントID
        'redirect_uri'  => url('passport/oauth/callback'),// 利用側アプリのコールバックURL（申請先アプリ内で登録済みであることが条件）
        'response_type' => 'code',                        // 認証コードをリクエスト
        'scope'         => '*',                           // ひとまず全権限
    ]);

    return redirect(url('oauth/authorize') .'?'. $query); // 申請先アプリへGETでリクエストを送信 → この後、申請先アプリ内の認可・拒否フォームが表示される
});

Route::get('passport/oauth/callback', function (Request $request) { // 利用側アプリのコールバックURL
    $http = new GuzzleHttp\Client;

    $response = $http->post(url('oauth/token'), [        // 申請先アプリへのアクセストークンリクエスト先URL
        'form_params'       => [
            'grant_type'    => 'authorization_code',     // グラント種別：コード認証
            'client_id'     => 21,                                        // 申請先アプリ内で登録済みのクライアントID
            'client_secret' => 'btb6D6JW1e2SVWIvus5I16niDIZmYfMtwxwAtVul',// 申請先アプリ内で登録済みのクライアントシークレット
            'redirect_uri'  => url('passport/oauth/callback'),            // 申請先アプリ内で登録済みの利用側アプリのコールバックURL
            'code'          => $request->code,                            // コールバック時に受け取る認証コード
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});

/**
 * Test
 */
Route::group([
    'prefix'     => 'test',
], function() {
    Route::get( '/',                 'TestController@index')->name('test');
    Route::get( 'render_mailable',   'TestController@renderMailable')->name('test.render_mailable');
});


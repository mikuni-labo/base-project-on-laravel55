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

Route::get('/',         'HomeController@index')->name('home');
Route::get('phpinfo',   'TestController@phpinfo')->name('phpinfo');

/**
 * Auth
 */
Auth::routes();

/**
 * Passport Client Test.
 */
Route::view('passport', 'passport')->name('passport');

Route::get('passport/oauth', function () {
    $query = http_build_query([
        'client_id'     => '4',
        'redirect_uri'  => url('passport/oauth/callback'),
        'response_type' => 'code',
        'scope'         => '',
    ]);

    return redirect(url('oauth/authorize') .'?'. $query);
});

Route::get('passport/oauth/callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post(url('oauth/token'), [
        'form_params'       => [
            'grant_type'    => 'authorization_code',
            'client_id'     => 4,
            'client_secret' => 'PSpaBGgrryuIqUd5P0klitdKDNLpHh0i3Z6qBxVk',
            'redirect_uri'  => url('passport/oauth/callback'),
            'code'          => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});

Route::get('passport/token_test', function (Request $request) {
    $client = new GuzzleHttp\Client;
    $accessToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijg0M2MzN2NkNTRiZGQ0ZDY0NTM2MWQ0YmVmOWMwZTdmOTQ1ZTIxOWJkMzFlNjM4MGRlNTE1MTBkMTQ0ZTlmYTZmZjFmMjE0OGUzMzNjYWNiIn0.eyJhdWQiOiIxIiwianRpIjoiODQzYzM3Y2Q1NGJkZDRkNjQ1MzYxZDRiZWY5YzBlN2Y5NDVlMjE5YmQzMWU2MzgwZGU1MTUxMGQxNDRlOWZhNmZmMWYyMTQ4ZTMzM2NhY2IiLCJpYXQiOjE1MDU4MDc4NTksIm5iZiI6MTUwNTgwNzg1OSwiZXhwIjoxNTM3MzQzODU5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.m6wGnzi7_4LREwm380deHhQ43h9wNY-Rdo6AEpTFeds7-QN-pXFjCRDZxXiVfdp-a_tDoyeI8gxnXfcoxLL02foPdzBdM1IUU7vZD6ULaCqdlPSSPSWFvZQI5A48U4r9TRGmYIx6aLoHqRf17o1gssw1dcDoRAyeXZJbuGXQvBabZYzg9a3o7GOO_HFBAjajXKGYk-vvP2G0dQzuGGP8PLdqKWC9crRwx9T6r-5DxxQazUx0aDBdWw0kebCT3BAHc-kbcnIPoi4BZvoBNTHqlmW5t6wexX_KKRlY1asUC5D4p5Bh6ctPe9m3v1JI-x3bJ7AuSxdsTaxapZjlcNEEVE8DAXR3qCrzLm8K0UZ40xrbBpFcjlL9I9SbPvhx0RDH1qon-ZG68SSDnQWidPZPqfl4VKFbWFe6nU-xusfVNigzNAMIi9nZaR1xREkHIDCD9zqHSBaUIs0qh79hZn74g13IKi_EjGl5NFNZ-KQTXAjTyQjUsQdiFY9cvo-VnFijOFZ8TmYqsFU8ORrSgSWlXtDYkayUL47A9nrxp6tSjHlNzAnrN9FkaBJcDZbXNZZN3jdwUFAYkkLUoqUVtR1QgrJn3Z2APfqsRHOAcU4WdJ-h8lYEuA8XCEup0qlq3PI1kalclPM6AYlHdKGFiAxPQWzY6pPhVXvsu5RP_1HiU1I";

    $response = $client->request('GET', url('api/user'), [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ],
    ]);

    return json_decode((string)$response->getBody(), true);
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


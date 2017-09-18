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

Route::view('/', 'welcome')->name('top');
Route::get('home',                   'HomeController@index')->name('home');
Route::get('phpinfo',                'TestController@phpinfo')->name('phpinfo');

/**
 * Auth
 */
Auth::routes();

/**
 * Test
 */
Route::group([
    'prefix'     => 'test',
], function() {
    Route::get( '/',                 'TestController@index')->name('test');
    Route::get( 'render_mailable',   'TestController@renderMailable')->name('test.render_mailable');
});

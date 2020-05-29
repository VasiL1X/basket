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

Route::post('auth/{provider}/callback', 'SocialAuthGoogleController@handleProviderCallback');
Route::post('reverse-geo-coding', 'SocialAuthGoogleController@reverseGeoCoding');
Route::get('payment/response', 'PaymentController@response');
Route::get('payment/final/response', 'PaymentController@finalResponse');

Route::post('get/card/errors', 'PaymentController@getErrors');
Route::post('get/card/data', 'PaymentController@getData');



Route::get('{path}', function () {
    return view('index');
})->where('path', '(.*)');

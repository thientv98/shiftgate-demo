<?php

use Illuminate\Http\Request;

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

Route::group([], function () {
});

Route::group(['prefix' => '/auth', ['middleware' => 'throttle: 20,5']], function () {
    Route::post('/register', 'Auth\RegisterController@register')->name('register');
    Route::post('/login', 'Auth\LoginController@login');
});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/me', 'MeController@index');
    Route::get('/auth/logout', 'MeController@logout');

    // Resource User
    Route::get('/user/list', 'UserController@index');
    Route::get('/user/{id}', 'UserController@show');
    Route::post('/user/save', 'UserController@save');
    Route::delete('/user/delete', 'UserController@delete');

    // Resource Member
    Route::get('/member/list', 'MemberController@index');
    Route::get('/member/{id}', 'MemberController@show');
    Route::post('/member/save', 'MemberController@save');
    Route::delete('/member/delete', 'MemberController@delete');
    Route::get('/common/prefecture/list', 'CommonController@prefecture');
    Route::get('/member/{id}/favorite', 'TradeController@favorite');

    // Resource Trade
    Route::resource('trade', 'TradeController');
    Route::post('trade/update-status', 'TradeController@updateStatus');
    Route::post('trade/update-trading-condition', 'TradeController@updateTradingCondition');
    Route::post('trade/delete-images', 'TradeController@deleteCarImage');

    // File upload
    Route::get('trade/{car_id}/file', 'FileController@fileList');
    Route::post('file/upload', 'FileController@uploadFile');
    Route::delete('file/delete', 'FileController@deleteFile');
    Route::get('file/update-estimate/{id}', 'FileController@uploadEstimate');

    // Contact List
    Route::resource('trade/{car_id}/contact', 'ContactController');
    Route::get('trade/contact/{id}', 'ContactController@contactInfo');
    Route::post('trade/contact/update/{id}', 'ContactController@updateContact');
    Route::delete('/trade/{car_id}/contact/delete', 'ContactController@destroy');

    // Statuses
    Route::get('get-all-status', 'TradeController@getAllStatus');

    // Resource Infos
    Route::get('/info/list', 'InfoController@index');
    Route::get('/info/{id}', 'InfoController@show');
    Route::post('/info/save', 'InfoController@save');
    Route::delete('/info/delete', 'InfoController@delete');

});

// Forgot Password
Route::post('password/email', 'Auth\ForgotPasswordController@sendMail');
Route::post('password/reset', 'Auth\ForgotPasswordController@reset');
Route::post('check-key', 'Auth\ForgotPasswordController@checkKey');

// CSV export
Route::get('/export/car', 'ExportController@car');
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

Route::group(['prefix' => '/auth', ['middleware' => 'throttle: 20,5']], function () {
    Route::post('/register', 'Auth\RegisterController@register')->name('register');
    Route::post('/register/confirm', 'Auth\RegisterController@confirm')->name('register.confirm');
    Route::post('/login', 'Auth\LoginController@login');
});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/me', 'MeController@index');
    Route::get('/customer/{id}', 'MeController@show');
    Route::post('/me/save', 'MeController@save');
    Route::get('/auth/logout', 'MeController@logout');
    Route::post('/withdrawal', 'MeController@withDrawal');
    Route::post('/update-car-consent', 'CarController@updateCarConsent');

    // insert car
    Route::resource('cars', 'CarController');
    Route::post('/update-favorite', 'CarController@updateFavorite');

    //electronic signature
    Route::post('electronic-signature', 'SignatureController@index');

    //Chat
    Route::resource('chat/conversations', 'ChatController')->except(['create', 'edit', 'destroy']);
    Route::get('getConversation', 'ChatController@getConversation');
    Route::group(['prefix' => '/chat/conversations'], function () {
        /* Conversation Participation */
        Route::post('{id}/participants', 'ChatController@storeParticipation');
        Route::delete('{id}/participants/{participation_id}', 'ChatController@destroyParticipation');
        Route::get('{id}/participants/{participation_id}', 'ChatController@showParticipation');
        Route::get('{id}/participants', 'ChatController@getParticipation');

        /* Messaging */
        Route::post('{id}/messages', 'ChatController@storeMessage');
        Route::get('{id}/messages', 'ChatController@getMessage');
        Route::get('{id}/messages/{message_id}', 'ChatController@showMessage');
        Route::delete('{id}/messages', 'ChatController@deleteAllMessage');
        Route::delete('{id}/messages/{message_id}', 'ChatController@destroyMessage');
    });

});

Route::get('maker-list', 'HomeController@getMakerList');
Route::get('get-prefecture/{id}', 'CommonController@getPrefecture');
Route::get('get-prefecture', 'CommonController@getPrefectureList');

// cars
Route::get('car-list', 'HomeController@getCarList');
Route::get('my-car', 'CarController@getCarsByFlag');
Route::get('favorite-car', 'CarController@favoriteCarId');
Route::get('car-detail/{id}', 'CarController@carDetail');
Route::get('car-file/{id}', 'HomeController@getCarFile');

Route::resource('contact', 'ContactController');

Route::post('password/email', 'Auth\ForgotPasswordController@sendMail');
Route::post('password/reset', 'Auth\ForgotPasswordController@reset');

//GMO
Route::post('test-gmo', 'SignatureController@index');

Route::get('notices', 'HomeController@getNotice');

Route::get('/tcpdf', 'HomeController@createPDF')->name('createPDF');

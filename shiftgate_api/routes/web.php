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
use App\Models\File;

Route::get('/', function () {
    return view('welcome');
});
//Auth::routes();

Route::post('/home', 'HomeController@index')->name('home');
Route::get('/not-allow', function () {
    echo 'このリソースへのアクセスは許可されていません';
});

Route::get('storage', function () {
    if (Session::get('fileName')) {
        if (Session::get('fileName') == $fileName) {
            return redirect()->back();
        }
    }
    return redirect('/not-allow');
});

Route::get('file/download/{id}/{userData}/{key}', function ($id, $userData, $key) {
    if (base64_decode(base64_decode($key)) == $userData) {

        $file = File::where('id', $id)->first();

        $path = Storage::url($file->image_path);
        return Storage::download($file->image_path, $file->image_name);
    } else {
        return redirect('/not-allow');
    }
});

Route::any('/ckfinder/examples/{example?}', '\CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
    ->name('ckfinder_examples');

Route::get('image-management/upload', function () {
    return view('image_management');
});

Route::get('pdf/seller', function () {
    return view('pdf.seller');
});

Route::get('pdf/buyer-cash', function () {
    return view('pdf.buyer-cash');
});

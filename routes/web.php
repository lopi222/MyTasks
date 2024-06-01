<?php

use App\Http\Middleware\IsAuth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::namespace('App\\Http\\Controllers')->group(function() {
    Route::middleware('auth')->group(function() {
        Route::get('/', 'Task\\TaskListController@index')->name('home');
        Route::get('/{id}/{name}', 'Task\\TaskListController@detail_index')->name('detail');
        Route::post('/', 'Task\\TaskListController@exit');

        Route::get('/{id}/{name}/redact', 'Task\\RedactController@index')->name('redact');
        Route::post('/{id}/{name}/redact', 'Task\\RedactController@update');

        Route::get('/{id}/{name}/deleat', 'Task\\RedactController@indexDeleat')->name('redact');
        Route::post('/{id}/{name}/deleat', 'Task\\RedactController@deleat');


        Route::get('/create', 'Task\\CreateController@index')->name('create');
        Route::post('/create', 'Task\\CreateController@create');
    });

    // Regist
    Route::middleware([IsAuth::class])->get('/regist', 'LoginController@indexRegist')->name('regist');
    Route::post('/regist', 'LoginController@storeRegist');

    // Login
    Route::middleware([IsAuth::class])->get('/login', 'LoginController@indexLogin')->name('login');
    Route::post('/login', 'LoginController@storeLogin');
});

<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('top');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::name('review.')
        ->group(function() {
            Route::get('/review/{id}', 'ReviewController@show')
                ->name('show');
            Route::get('/index', 'ReviewController@index')
                ->name('index');
            Route::get('/review', 'ReviewController@create')
                ->name('create');
            Route::post('/review/store', 'ReviewController@store')
                ->name('store');
        });
});

Route::group(['middleware' => 'auth'], function() {
    Route::name('user.')
        ->group(function() {
            Route::get('/user', 'UserController@show')
                ->name('show');
            Route::post('/user', 'UserController@update')
                ->name('update');
        });
});

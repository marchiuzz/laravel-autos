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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Auth::routes(["register" => false]);

    Route::group(['middleware' => ['auth'], 'as' => 'admin.'], function () {
        Route::resource('autos', 'AutoController');
        Route::resource('categories', 'CategoryController');


        Route::resource('options', 'OptionsController');
        Route::resource('options_values', 'OptionsValuesController');


    });

});

Route::get('/home', 'HomeController@index')->name('home');

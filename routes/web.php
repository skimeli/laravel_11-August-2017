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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function() {

    Route::get('articles', 'ArticlesController@index');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/items', 'ItemController@index')->name('items.index');
Route::get('/items/create', 'ItemController@create')->name('items.create');
Route::post('/items', 'ItemController@store')->name('items.store');
Route::get('/items/{id}', 'ItemController@show')->name('items.show');
Route::get('/items/{id}/edit', 'ItemController@show')->name('items.edit');
Route::put('/items/{id}', 'ItemController@update')->name('items.update');
Route::delete('/items/{id}', 'ItemController@destroy')->name('items.destroy');

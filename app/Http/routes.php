<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/item', 'ItemController@showForm');
Route::post('/item', 'ItemController@addItem');
Route::get('/itemlist','ItemController@itemList');

Route::get('/item/update', 'ItemController@updateForm');
Route::post('/item/update','ItemController@updateItem');
Route::get('/listdata', 'ItemController@getJsonItems');

Route::get('/search/{item}', 'ItemController@getSearch');
Route::get('/{item}','ItemController@showItem');

Route::delete('/item/{item}', 'ItemController@deleteItem');

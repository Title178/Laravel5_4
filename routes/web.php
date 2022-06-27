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
    return view('home');
});

Route::get('/page1','page1Controller@index')->middleware('checkApi');

Route::get('/positions','positionsController@index');
Route::post('/position','positionsController@store');
Route::get('/position/{id}','positionsController@edit');
Route::put('/position/{id}','positionsController@update');
Route::get('/position_destroy/{id}','positionsController@destroy')->name('position.destroy');
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/


/**
 * Practice
 */
Route::any('/practice/{n?}', 'PracticeController@index');


Route::get('/', 'QuoteController@index');
Route::get('/get-quotes','QuoteController@getQuotes');
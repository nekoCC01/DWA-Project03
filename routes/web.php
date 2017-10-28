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


//Entry Point, shows random quote with pre-defined filters (only with img), welcome header
Route::get('/', 'WelcomeController');
//Index, shows all quotes, offers a form for filtering
Route::get('/quote', 'QuoteController@index');
//Single-View with own name below Quote
Route::get('/quote/pretend','QuoteController@pretend');
//Quote-Single-View, shows one quote, with img (if available), either random or selected
Route::get('/quote/{quote}', 'QuoteController@show');




/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/env', function () {
    dump(config('app.name'));
    dump(config('app.env'));
    dump(config('app.debug'));
    dump(config('app.url'));
});

/**
 * Practice
 */
Route::any('/practice/{n?}', 'PracticeController@index');


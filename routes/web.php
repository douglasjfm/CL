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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/load_tab', 'HomeController@load_tab');

Route::get('/detalhar/{id}/{latlng}/{classe}/{volume}/{ts}/{img}', 'HomeController@detalhar');

Route::get('mapa', 'HomeController@mapa');

<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@index')->name('home');

//nelle rotte, mettendo dopo la URI e uno slash fra le graffe passo una var in GET che viene letta come parametro nel metodo del controller
Route::get('/saluto/{nome}/{cognome}','PageController@saluto')->name('saluto');

// con  ::resource crea tutte le rotte della CRUD mettendole in relazione al resource controller
Route::resource('pastas', 'PastaController');

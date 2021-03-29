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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/api_reniec/{dni}/dni','HomeController@api_reniec');//camboar a post
Route::get('/search_personal/{dni}/dni','HomeController@search_personal');
Route::post('/registrar_cita','HomeController@registrar_cita');

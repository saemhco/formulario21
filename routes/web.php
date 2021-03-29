<?php

use Illuminate\Support\Facades\Auth;
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
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/registro_trabajador_UNHEVAL', 'PersonalController@index');
Route::post('/registro_trabajador_UNHEVAL', 'PersonalController@register')->name('registro_trabajador');
Route::get('/api_reniec/{dni}/dni','HomeController@api_reniec');//camboar a post
Route::get('/search_personal/{dni}/dni','HomeController@search_personal');

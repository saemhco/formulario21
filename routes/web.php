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
Route::get('/login', 'AdminController@login')->name('login');
//Route::post('/login', 'UserController@login')->name('login_sesion');

Route::get('/admin/trabajadores_unheval', 'AdminController@index');
Route::get('/admin/actualizar_estado', 'AdminController@cambiar_estado');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/registro_trabajador_UNHEVAL', 'PersonalController@index');
Route::post('/registro_trabajador_UNHEVAL', 'PersonalController@register')->name('registro_trabajador');
Route::get('/api_reniec/{dni}/dni','HomeController@api_reniec');//camboar a post
Route::get('/search_personal/{dni}/dni','HomeController@search_personal');
Route::post('/registrar_cita','HomeController@registrar_cita');

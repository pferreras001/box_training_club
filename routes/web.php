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

Route::get('/', 'App\Http\Controllers\PagesController@inicio')->name('inicio');
Route::get('/horarios', 'App\Http\Controllers\PagesController@horarios')->name('horarios');
Route::get('/actividades', 'App\Http\Controllers\PagesController@actividades')->name('actividades');
Route::get('/cuotas', 'App\Http\Controllers\PagesController@cuotas')->name('cuotas');
Route::get('/contacto', 'App\Http\Controllers\PagesController@contacto')->name('contacto');
Route::get('/blog', 'App\Http\Controllers\PagesController@blog')->name('blog');
Route::get('/galeria', 'App\Http\Controllers\PagesController@galeria')->name('galeria');
Route::get('/tienda', 'App\Http\Controllers\PagesController@tienda')->name('tienda');
Route::get('/users', 'App\Http\Controllers\PagesController@users')->name('users');
Route::get('/modificar/{id}', 'App\Http\Controllers\PagesController@modificar')->name('modificar');
Route::post('/modificar', 'App\Http\Controllers\PagesController@update')->name('update');
Route::get('/delete/{id}', 'App\Http\Controllers\PagesController@delete')->name('delete');
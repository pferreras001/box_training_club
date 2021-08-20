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
Route::get('/contacto_asunto/{id}', 'App\Http\Controllers\PagesController@contacto_asunto')->name('contacto_asunto');
Route::post('/contacto', 'App\Http\Controllers\PagesController@enviar_contacto')->name('contacto');
Route::get('/blog', 'App\Http\Controllers\PagesController@blog')->name('blog');
Route::get('/galeria', 'App\Http\Controllers\PagesController@galeria')->name('galeria');
Route::get('/tienda', 'App\Http\Controllers\PagesController@tienda')->name('tienda');
Route::get('/login', 'App\Http\Controllers\PagesController@login')->name('login');
Route::get('/aviso_legal', 'App\Http\Controllers\PagesController@avisoLegal')->name('aviso_legal');





//rutas para el blog
Route::get('/blog', 'App\Http\Controllers\BlogController@blog')->name('blog');
Route::post('/blog', 'App\Http\Controllers\BlogController@blog_search')->name('blog');
Route::get('/create_entry', 'App\Http\Controllers\BlogController@create_entry')->name('create_entry');
Route::post('/insert_entry', 'App\Http\Controllers\BlogController@insert_entry')->name('insert_entry');
Route::get('/show_entry/{id}', 'App\Http\Controllers\BlogController@show_entry')->name('show_entry');
Route::get('/edit_entry/{id}', 'App\Http\Controllers\BlogController@edit_entry')->name('edit_entry');
Route::post('/edit_entry', 'App\Http\Controllers\BlogController@update_entry')->name('update_entry');
Route::get('/delete_entry/{id}', 'App\Http\Controllers\BlogController@delete_entry')->name('delete_entry');





//parte administracion
Route::get('/dar_alta', 'App\Http\Controllers\AdminController@dar_alta')->name('dar_alta');
Route::get('/users', 'App\Http\Controllers\AdminController@users')->name('users');
Route::get('/modificar/{id}', 'App\Http\Controllers\AdminController@modificar')->name('modificar');
Route::post('/modificar', 'App\Http\Controllers\AdminController@update')->name('update');
Route::get('/delete/{id}', 'App\Http\Controllers\AdminController@delete')->name('delete');
Route::get('/send_signup_mail/{id}', 'App\Http\Controllers\AdminController@send_signup_mail')->name('send_signup_mail');
Route::get('/admin_perfil/{id}', 'App\Http\Controllers\AdminController@admin_perfil')->name('admin_perfil');
Route::get('/aumentarcopa/{id}', 'App\Http\Controllers\AdminController@aumentarcopa')->name('aumentarcopa');
Route::get('/disminuircopa/{id}', 'App\Http\Controllers\AdminController@disminuircopa')->name('disminuircopa');
Route::post('/search_user', 'App\Http\Controllers\AdminController@search_user')->name('search_user');
Route::get('/gestionar_colaboradores', 'App\Http\Controllers\AdminController@gestionar_colaboradores')->name('gestionar_colaboradores');
Route::get('/anadir_colab', 'App\Http\Controllers\AdminController@anadir_colab')->name('anadir_colab');
Route::post('/insertar_colab', 'App\Http\Controllers\AdminController@insertar_colab')->name('insertar_colab');
Route::get('/editar_colab/{id}', 'App\Http\Controllers\AdminController@editar_colab')->name('editar_colab');
Route::post('/editar_colab', 'App\Http\Controllers\AdminController@update_colab')->name('update_colab');
Route::get('/eliminar_colab/{id}', 'App\Http\Controllers\AdminController@eliminar_colab')->name('eliminar_colab');





//parte de gestion de los usuarios
Route::post('/session_start', 'App\Http\Controllers\UserController@session_start')->name('session_start');
Route::post('/send_register', 'App\Http\Controllers\UserController@send_register')->name('send_register');
Route::get('/confirmacion', 'App\Http\Controllers\UserController@confirmar')->name('confirmar');
Route::get('/signup_form/{code}', 'App\Http\Controllers\UserController@signup_form')->name('signup_form');
Route::post('/signup_update', 'App\Http\Controllers\UserController@signup_update')->name('signup_update');
Route::get('/recover_password', 'App\Http\Controllers\UserController@password_recovery')->name('recover_password');
Route::post('/recover_password', 'App\Http\Controllers\UserController@send_recover')->name('send_recover');
Route::get('/recover_form/{id}', 'App\Http\Controllers\UserController@recover_form')->name('recover_form');
Route::post('/update_pass', 'App\Http\Controllers\UserController@update_pass')->name('update_pass');
Route::put('/logout', 'App\Http\Controllers\UserController@logout')->name('logout');



//parte de usuario loggeado
Route::get('/perfil', 'App\Http\Controllers\SociosController@perfil')->name('perfil');
Route::get('/colaboradores', 'App\Http\Controllers\SociosController@colaboradores')->name('colaboradores');

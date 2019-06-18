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

Auth::routes(['verify' => true, 'register' => false]);//no permite registrar

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users','UserController');

Route::resource('permissions','PermissionController');

Route::resource('roles','RolesController');

Route::resource('dashboard','DashboardController');

Route::get('/show_permissions','PermissionController@show');

Route::put('/manage_permissions/{id}','UserController@manage_permissions')->name('manage_permissions');

Route::resource('categorias','CategoriaController');

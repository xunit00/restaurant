<?php

use App\Events\OrderStatusChanged;

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

// Route::get('/fire', function () {
//     event(new OrderStatusChanged);
//     return 'Fired';
// });

Auth::routes(['verify' => true, 'register' => false]); //no permite registrar

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::resources([
        'users' => 'UserController',
        'permissions' => 'PermissionController',
        'roles' => 'RolesController',
        'dashboard' => 'DashboardController',
        'categorias' => 'CategoriaController',
        'unidades' => 'UnidadController',
        'productos' => 'ProductoController',
        // 'orders'=>'OrderController',
        // 'tracker'=>'TrackerController',
    ]);

    Route::get('/home', 'HomeController@index')->name('home');

    Route::put('/manage_permissions/{id}', 'UserController@manage_permissions')->name('manage_permissions');

    //rutas para trabajar con la tabla pivot
    Route::prefix('productos')->as('productos.')->group(function () {
        Route::post('/unidad/store_produnid', 'ProductoController@store_produnid')->name('store_produnid');
        Route::delete('/unidad', 'ProductoController@destroy')->name('destroy_produnid');
        Route::get('/unidad/create_produnid', 'ProductoController@create_produnid')->name('create_produnid');
        Route::put('/unidad/{prod_unidad}', 'ProductoController@update_produnid')->name('update_produnid');
        Route::get('/unidad/{prod_unidad}/edit', 'ProductoController@edit_produnid')->name('edit_produnid');
    });
});




// User Routes
Route::middleware('auth')->group(function () {
    Route::get('/orders', 'UserOrdersController@index')->name('user.orders');
    Route::get('/orders/create', 'UserOrdersController@create')->name('user.orders.create');
    Route::post('/orders', 'UserOrdersController@store')->name('user.orders.store');
    Route::get('/orders/{order}', 'UserOrdersController@show')->name('user.orders.show');
});
// Admin Routes - Make sure you implement an auth layer here
Route::prefix('admin')->group(function () {
    Route::get('/orders', 'AdminOrdersController@index')->name('admin.orders');
    Route::get('/orders/edit/{order}', 'AdminOrdersController@edit')->name('admin.orders.edit');
    Route::patch('/orders/{order}', 'AdminOrdersController@update')->name('admin.orders.update');
});

Route::redirect('/admin', '/admin/orders');

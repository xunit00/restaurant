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
        'comprobanteTipo' => 'ComprobanteTipoController',
        'comprobanteSecuencia'=>'ComprobanteSecuenciaController',
        'recetas'=>'RecetaController',
        'platos'=>'PlatoController',
        'areas'=>'AreaController',
        'mesas'=>'MesaController',
    ]);

    Route::get('/home', 'HomeController@index')->name('home');

    //rutas para actualizar status
    Route::prefix('status')->as('status.')->group(function () {
        Route::put('/categoria/{categoria}', 'CategoriaController@update_status')->name('categoria');
        Route::put('/plato/{plato}', 'PlatoController@update_status')->name('plato');
        Route::put('/unidad/{unidade}', 'UnidadController@update_status')->name('unidad');
        Route::put('/comprobanteTipo/{comprobanteTipo}', 'ComprobanteTipoController@update_status')->name('comprobanteTipo');
        Route::put('/comprobanteSecuencia/{comprobanteSecuencia}', 'ComprobanteSecuenciaController@update_status')->name('comprobanteSecuencia');
        Route::put('/receta/{receta}', 'RecetaController@update_status')->name('receta');
        Route::put('/area/{area}', 'AreaController@update_status')->name('area');
        Route::put('/mesa/{mesa}', 'MesaController@update_status')->name('mesa');
    });

    //vista de permisos por usuarios
    Route::put('/managePermissions/{id}', 'UserController@managePermissions')->name('managePermissions');

    //rutas para trabajar con search
    Route::prefix('search')->as('search.')->group(function () {
        Route::get('/categoria', 'CategoriaController@search')->name('categorias');
        Route::get('/user', 'UserController@search')->name('users');
        Route::get('/unidad', 'UnidadController@search')->name('unidades');
        Route::get('/producto', 'ProductoController@search')->name('productos');
        Route::get('/rol', 'RolesController@search')->name('roles');
        Route::get('/permission', 'PermissionController@search')->name('permissions');
        Route::get('/comprobanteTipo', 'ComprobanteTipoController@search')->name('comprobanteTipos');
        Route::get('/comprobanteSecuencia', 'ComprobanteSecuenciaController@search')->name('comprobanteSecuencias');
        Route::get('/plato', 'PlatoController@search')->name('platos');
        Route::get('/receta', 'RecetaController@search')->name('recetas');
        Route::get('/area', 'AreaController@search')->name('areas');
        Route::get('/mesa', 'MesaController@search')->name('mesas');
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

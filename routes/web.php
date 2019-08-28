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

    Route::Resources([
        'dashboard' => 'DashboardController',
        'catInsumo' => 'CategoriaInsumoController',
        'catProductos' => 'CategoriaProductoController',
        'unidades' => 'UnidadController',
        'productos' => 'ProductoController',
        'comprobanteTipo' => 'ComprobanteTipoController',
        'comprobanteSecuencia' => 'ComprobanteSecuenciaController',
        'recetas' => 'RecetaController',
        'insumos' => 'InsumoController',
        'areas' => 'AreaController',
        'mesas' => 'MesaController',
        'clientes' => 'ClienteController',
        'notaVentas' => 'NotaVentaController',
        'transacciones' => 'TransaccionInventarioController',
    ]);

    //rutas de admin
    Route::namespace('Admin')->prefix('admin')->as('admin.')->group(function () {
        Route::Resources([
            'users' => 'UserController',
            'roles' => 'RolesController',
        ]);
        Route::put('/managePermissions/{id}', 'UserController@managePermissions')->name('managePermissions');
    });

    //reportes
    Route::prefix('reportes')->as('reportes.')->group(function () {
        Route::get('/notaVentas/reportPDF', 'NotaVentaController@reportPDF')->name('notaVentaPDF');
    });

    //rutas para actualizar status
    Route::prefix('status')->as('status.')->group(function () {
        Route::put('/catInsumo/{categoria}', 'CategoriaInsumoController@update_status')->name('catInsumo');
        Route::put('/catProducto/{categoria}', 'CategoriaProductoController@update_status')->name('catProducto');
        Route::put('/producto/{producto}', 'ProductoController@update_status')->name('producto');
        Route::put('/insumo/{insumo}', 'InsumoController@update_status')->name('insumo');
        Route::put('/unidad/{unidade}', 'UnidadController@update_status')->name('unidad');
        Route::put('/comprobanteTipo/{comprobanteTipo}', 'ComprobanteTipoController@update_status')->name('comprobanteTipo');
        Route::put('/comprobanteSecuencia/{comprobanteSecuencia}', 'ComprobanteSecuenciaController@update_status')->name('comprobanteSecuencia');
        Route::put('/receta/{receta}', 'RecetaController@update_status')->name('receta');
        Route::put('/area/{area}', 'AreaController@update_status')->name('area');
        Route::put('/mesa/{mesa}', 'MesaController@update_status')->name('mesa');
        Route::put('/transaccion/{transaccione}', 'TransaccionInventarioController@update_status')->name('transaccion');
    });

    //vista de permisos por usuarios
    Route::put('/managePermissions/{id}', 'UserController@managePermissions')->name('managePermissions');

    //rutas para trabajar con search
    Route::prefix('search')->as('search.')->group(function () {
        Route::get('/catInsumo', 'CategoriaInsumoController@search')->name('catInsumo');
        Route::get('/catProducto', 'CategoriaProductoController@search')->name('catProductos');
        Route::get('/user', 'UserController@search')->name('users');
        Route::get('/unidad', 'UnidadController@search')->name('unidades');
        Route::get('/producto', 'ProductoController@search')->name('productos');
        Route::get('/insumo', 'InsumoController@search')->name('insumos');
        Route::get('/rol', 'RolesController@search')->name('roles');
        Route::get('/permission', 'PermissionController@search')->name('permissions');
        Route::get('/comprobanteTipo', 'ComprobanteTipoController@search')->name('comprobanteTipos');
        Route::get('/comprobanteSecuencia', 'ComprobanteSecuenciaController@search')->name('comprobanteSecuencias');
        Route::get('/receta', 'RecetaController@search')->name('recetas');
        Route::get('/area', 'AreaController@search')->name('areas');
        Route::get('/mesa', 'MesaController@search')->name('mesas');
        Route::get('/cliente', 'ClienteController@search')->name('clientes');
        Route::get('/transaccion', 'TransaccionInventarioController@search')->name('transacciones');
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

<?php

namespace App\Http\Controllers;

use App\Unidad;
use App\Producto;
use App\Categoria;
use App\Http\Requests\ProductoUnidadRequest;
use App\Http\Requests\ProductoRequest;
use Carbon\Carbon;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth',
        'permission:update.productos|create.productos|delete.productos|read.productos']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::latest()->paginate(10);

        return view('inventario.productos.index', compact('productos','prod_unidad'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUnidad()
    {
        $prod_unidad = Unidad::with('productos')->latest()->paginate(10);

        return view('inventario.productos.unidad.index', compact('prod_unidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Producto $producto)
    {
        $categorias = Categoria::whereStatus(1)->pluck('nombre', 'id');

        return view('inventario.productos.create', compact('categorias', 'unidades','producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        $producto= new Producto;

        if ($request->has('imagen'))
        {
            $imageName = $request->nombre_producto.'_'.time();
            // Image::make($request->imagen)->save(public_path('/storage/img/productos/') . $imageName);
            // $request->merge(['imagen' => $imageName]);
        }

        $producto->create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto Creado!');
    }

    /**
     * muestra form para crear unnuevo recurso de producto y unidad
     *
     * @return \Illuminate\Http\Response
     */
    public function create_produnid()
    {
        $prod_unidad=Unidad::with('productos')->get();

        $productos = Producto::all()->pluck('nombre_producto', 'id');

        $unidades = Unidad::whereStatus(1)->pluck('nombre_unidad', 'id');

        return view('inventario.productos.unidad.create', compact('productos', 'unidades','prod_unidad'));
    }

    /**
     * guarda en store el nuevo recurso de prod unidad
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_produnid(ProductoUnidadRequest $request)
    {
        $producto = Producto::findOrFail($request->producto_id);

        $producto->unidad()->attach($request->unidad_id, [
            'cantidad' => $request->cantidad,
            'precio_venta' => $request->precio_venta,
            'costo' => $request->costo,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('productos.indexUnidad')
        ->with('success', 'Producto Unidad Creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::whereStatus(1)->pluck('nombre', 'id');

        $unidades = Unidad::whereStatus(1)->pluck('nombre_unidad', 'id');

        return view('inventario.productos.edit', compact('producto', 'categorias', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, Producto $producto)
    {
        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto Actualizado Correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  array  $prod_unidad
     * @return \Illuminate\Http\Response
     */
    public function edit_produnid($prod_unidad)
    {
        $prod_unidad=Unidad::with('productos')->find($prod_unidad);

        $productos = Producto::all()->pluck('nombre_producto','id');

        $unidades = Unidad::whereStatus(1)->pluck('nombre_unidad','id');

        return view('inventario.productos.unidad.edit', compact('productos','unidades','prod_unidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_produnid(ProductoUnidadRequest $request)
    {
        $producto = Producto::findOrFail($request->producto_id);

        $producto->unidad()->updateExistingPivot($request->unidad_id, [
            'cantidad' => $request->cantidad,
            'precio_venta' => $request->precio_venta,
            'costo' => $request->costo,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('productos.indexUnidad')
            ->with('success', 'Producto Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto= Producto::findOrFail($id);

        $producto->unidad()->detach();

        $producto->delete();

        return redirect()->route('productos.index')
        ->with('success','Producto Eliminada Correctamente');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  array  $prod_unidad
     * @return \Illuminate\Http\Response
     */
    public function destroy_produnid($prod_unidad)
    {
        $unidad=Unidad::with('productos')->findOrFail($prod_unidad);

        $unidad->productos()->detach($unidad->productos);

        return redirect()->route('productos.indexUnidad')
        ->with('success','Producto Eliminado Correctamente');
    }
}

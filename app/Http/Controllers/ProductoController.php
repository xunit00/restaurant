<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CategoriasProducto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;

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

        return view('configuracion.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Producto $producto)
    {
        $categorias = CategoriasProducto::whereStatus(1)->pluck('nombre', 'id');

        return view('configuracion.productos.create', compact('categorias','producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        Producto::create($request->all());

        return redirect()->route('productos.index')
        ->with('success', 'Producto Creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias = CategoriasProducto::whereStatus(1)->pluck('nombre', 'id');

        return view('configuracion.productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, Producto $producto)
    {
        $producto->update($request->all());

        return redirect()->route('productos.index')
        ->with('success','Producto Actualizado Correctamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update_status(Producto $producto)
    {
        if($producto->status==1){
            $producto->update(['status'=>0]);
        }
        else{
            $producto->update(['status'=>1]);
        }

        return redirect()->route('productos.index')
        ->with('success','Producto Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
        ->with('success','Producto Eliminado Correctamente');
    }

     /**
     * Search an item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $productos=Producto::search($request->value)->paginate(10);

        return view('configuracion.productos.index', compact('productos'));
    }
}

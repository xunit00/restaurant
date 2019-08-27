<?php

namespace App\Http\Controllers;

use App\Models\CategoriasProducto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\CategoriaProductoRequest;

class CategoriaProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth',
        'permission:update.categorias|create.categorias|delete.categorias|read.categorias']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catProductos= CategoriasProducto::latest()->paginate(10);
        return view('configuracion.categorias.producto.index',compact('catProductos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoriasProducto $catProducto)
    {
        return view('configuracion.categorias.producto.create',compact('catProducto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaProductoRequest $request)
    {
        CategoriasProducto::create($request->all());

        return redirect()->route('catProductos.index')
        ->with('success', 'Categoria Creada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriasProducto  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriasProducto $catProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriasProducto  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriasProducto $catProducto)
    {
        return view('configuracion.categorias.producto.edit',compact('catProducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriasProducto  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaProductoRequest $request, CategoriasProducto $catProducto)
    {
        $catProducto->update($request->all());

        return redirect()->route('catProductos.index')
        ->with('success','Categoria Actualizada Correctamente');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \App\CategoriasProducto  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update_status(CategoriasProducto $catProducto)
    {
        if($catProducto->status==1){
            $catProducto->update(['status'=>0]);
        }
        else{
            $catProducto->update(['status'=>1]);
        }

        return redirect()->route('catProductos.index')
        ->with('success','Categoria Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriasProducto  $catProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriasProducto $catProducto)
    {
        $catProducto->delete();

        return redirect()->route('catProductos.index')
        ->with('success','Categoria Eliminada Correctamente');
    }

    /**
     * Search an item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $catProducto=CategoriasProducto::search($request->value)->paginate(10);

        return view('configuracion.categorias.producto.index',compact('catProducto'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Unidad;
use App\Producto;
use App\Categoria;
use App\Producto_Unidad;
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
        $productos=Producto_Unidad::with('unidad','producto')->paginate(10);
        return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias= Categoria::all()->pluck('nombre','id');
        $unidades=Unidad::all()->pluck('nombre_unidad','id');
        return view('productos.create',compact('categorias','unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request_prod)
    {
        Producto::create($request_prod->all());

        // Producto_Unidad::create();

        return redirect()->route('productos.index')
        ->with('success', 'Producto Creado!');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

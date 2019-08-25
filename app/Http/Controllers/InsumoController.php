<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Models\Insumo;
use App\Models\CategoriasInsumo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ImageTrait;
use App\Http\Requests\InsumoRequest;


class InsumoController extends Controller
{
    use ImageTrait;

    public function __construct()
    {
        $this->middleware([
            'auth',
            'permission:update.productos|create.productos|delete.productos|read.productos'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::latest()->paginate(10);

        return view('inventario.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Producto $producto)
    {
        $categorias = Categoria::whereStatus(1)->pluck('nombre', 'id');

        $unidades = Unidad::whereStatus(1)->pluck('nombre', 'id');

        return view('inventario.productos.create', compact('categorias', 'unidades', 'producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsumoRequest $request)
    {
        $formInput = $request->all();

        $formInput['imagen'] = $this->storeImage($request, 'imagen', 'producto');

        Producto::create($formInput);

        return redirect()->route('productos.index')
            ->with('success', 'Producto Creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('inventario.productos.show', compact('producto'));
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

        $unidades = Unidad::whereStatus(1)->pluck('nombre', 'id');

        return view('inventario.productos.edit', compact('producto', 'categorias', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(InsumoRequest $request, Producto $producto)
    {
        $formInput = $request->all();

        if ($request->hasFile('imagen')) {

            $currentImage = $producto->imagen;

            $formInput['imagen'] = $this->updateImage($request, 'imagen', 'producto', $currentImage,'/storage/imagenes/producto/');
        }

        $producto->update( $formInput);

        return redirect()->route('productos.index')
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
        $producto = Producto::findOrFail($id);

        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto Eliminado Correctamente');
    }

    /**
     * Search an item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $productos = Producto::search($request->value)->paginate(10);

        return view('inventario.productos.index', compact('productos'));
    }
}

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
        $insumos = Insumo::latest()->paginate(10);

        return view('configuracion.insumos.index', compact('insumos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Insumo $insumo)
    {
        $categorias = CategoriasInsumo::whereStatus(1)->pluck('nombre', 'id');

        $unidades = Unidad::whereStatus(1)->pluck('nombre', 'id');

        return view('configuracion.insumos.create', compact('categorias', 'unidades', 'insumo'));
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

        $formInput['imagen'] = $this->storeImage($request, 'imagen', 'insumo');

        Insumo::create($formInput);

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo Creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Insumo $insumo)
    {
        return view('configuracion.insumos.show', compact('insumo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumo $insumo)
    {
        $categorias = CategoriasInsumo::whereStatus(1)->pluck('nombre', 'id');

        $unidades = Unidad::whereStatus(1)->pluck('nombre', 'id');

        return view('configuracion.insumos.edit', compact('insumo', 'categorias', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(InsumoRequest $request, Insumo $insumo)
    {
        $formInput = $request->all();

        if ($request->hasFile('imagen')) {

            $currentImage = $insumo->imagen;

            $formInput['imagen'] = $this->updateImage($request, 'imagen', 'insumo', $currentImage,'/storage/imagenes/insumo/');
        }

        $insumo->update( $formInput);

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Insumo= Insumo::findOrFail($id);

        $Insumo->delete();

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo Eliminado Correctamente');
    }

    /**
     * Search an item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $insumos = Insumo::search($request->value)->paginate(10);

        return view('configuracion.insumos.index', compact('insumos'));
    }
}

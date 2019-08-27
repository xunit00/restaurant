<?php

namespace App\Http\Controllers;

use App\Models\CategoriasInsumo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaInsumoRequest;

class CategoriaInsumoController extends Controller
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
        $catInsumo= CategoriasInsumo::latest()->paginate(10);
        return view('configuracion.categorias.insumo.index',compact('catInsumo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoriasInsumo $catInsumo)
    {
        return view('configuracion.categorias.insumo.create',compact('catInsumo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaInsumoRequest $request)
    {
        CategoriasInsumo::create($request->all());

        return redirect()->route('catInsumo.index')
        ->with('success', 'Categoria Creada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriasInsumo  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriasInsumo $catInsumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriasInsumo  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriasInsumo $catInsumo)
    {
        return view('configuracion.categorias.insumo.edit',compact('catInsumo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriasInsumo  $catInsumo
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaInsumoRequest $request, CategoriasInsumo $catInsumo)
    {
        $catInsumo->update($request->all());

        return redirect()->route('catInsumo.index')
        ->with('success','Categoria Actualizada Correctamente');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \App\CategoriasInsumo  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update_status(CategoriasInsumo $catInsumo)
    {
        if($catInsumo->status==1){
            $catInsumo->update(['status'=>0]);
        }
        else{
            $catInsumo->update(['status'=>1]);
        }

        return redirect()->route('catInsumo.index')
        ->with('success','Categoria Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriasInsumo  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriasInsumo $catInsumo)
    {
        $catInsumo->delete();

        return redirect()->route('catInsumo.index')
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
        $catInsumo=CategoriasInsumo::search($request->value)->paginate(10);

        return view('configuracion.categorias.insumo.index',compact('catInsumo'));
    }

}

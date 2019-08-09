<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
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
        $categorias= Categoria::latest()->paginate(10);
        return view('inventario.categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Categoria $categoria)
    {
        return view('inventario.categorias.create',compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        Categoria::create($request->all());

        return redirect()->route('categorias.index')
        ->with('success', 'Categoria Creada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('inventario.categorias.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        $categoria->update($request->all());

        return redirect()->route('categorias.index')
        ->with('success','Categoria Actualizada Correctamente');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update_status(Categoria $categoria)
    {
        if($categoria->status==1){
            $categoria->update(['status'=>0]);
        }
        else{
            $categoria->update(['status'=>1]);
        }

        return redirect()->route('categorias.index')
        ->with('success','Categoria Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')
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
        $categorias=Categoria::search($request->value)->paginate(10);

        return view('inventario.categorias.index',compact('categorias'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CategoriasProducto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PlatoRequest;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth',
        'permission:update.platos|create.platos|delete.platos|read.platos']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos = Plato::latest()->paginate(10);

        return view('configuracion.platos.index', compact('platos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Plato $plato)
    {
        $categorias = Categoria::whereStatus(1)->pluck('nombre', 'id');

        return view('configuracion.platos.create', compact('categorias','plato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlatoRequest $request)
    {
        Plato::create($request->all());

        return redirect()->route('platos.index')
        ->with('success', 'Plato Creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function show(Plato $plato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function edit(Plato $plato)
    {
        $categorias = Categoria::whereStatus(1)->pluck('nombre', 'id');

        return view('configuracion.platos.edit', compact('plato', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function update(PlatoRequest $request, Plato $plato)
    {
        $plato->update($request->all());

        return redirect()->route('platos.index')
        ->with('success','Plato Actualizado Correctamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function update_status(Plato $plato)
    {
        if($plato->status==1){
            $plato->update(['status'=>0]);
        }
        else{
            $plato->update(['status'=>1]);
        }

        return redirect()->route('platos.index')
        ->with('success','Plato Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plato $plato)
    {
        $plato->delete();

        return redirect()->route('platos.index')
        ->with('success','Plato Eliminado Correctamente');
    }

     /**
     * Search an item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $platos=Plato::search($request->value)->paginate(10);

        return view('configuracion.platos.index', compact('platos'));
    }
}

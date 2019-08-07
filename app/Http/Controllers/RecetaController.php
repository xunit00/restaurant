<?php

namespace App\Http\Controllers;

use App\Receta;
use Illuminate\Http\Request;
use App\DetalleReceta;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = Receta::latest()->paginate(10);

        return view('configuracion.recetas.index', compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Receta $receta)
    {
        return view('configuracion.recetas.create',compact('receta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Receta::create($request->all());

        return redirect()->route('recetas.index')
        ->with('success', 'Receta Creada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        return view('configuracion.recetas.create',compact('receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Receta  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update_status(Receta $receta)
    {
        if($receta->status==1){
            $receta->update(['status'=>0]);
        }
        else{
            $receta->update(['status'=>1]);
        }

        return redirect()->route('recetas.index')
        ->with('success','Receta Actualizada Correctamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        $receta->delete();

        return redirect()->route('recetas.index')
        ->with('success','Receta Eliminada Correctamente');
    }
}

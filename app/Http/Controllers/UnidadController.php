<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidad;
use App\Http\Controllers\Controller;
use App\Http\Requests\UnidadRequest;


class UnidadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth',
        'permission:update.unidades|create.unidades|delete.unidades|read.unidades']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  Unidad::latest()->paginate(10);
        // return view('inventario.unidades.index',compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Unidad $unidad)
    {
        return view('inventario.unidades.create',compact('unidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnidadRequest $request)
    {
        Unidad::create($request->all());

        return redirect()->route('unidades.index')
        ->with('success', 'Unidad Creada!');
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
    public function edit($id)
    {
        $unidad = Unidad::findOrFail($id);
        return view('inventario.unidades.edit',compact('unidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnidadRequest $request, Unidad $unidade)
    {
        $unidade->update($request->all());

        return redirect()->route('unidades.index')
        ->with('success','Unidad Actualizada Correctamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Unidad  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update_status(Unidad $unidade)
    {
        if($unidade->status==1){
            $unidade->update(['status'=>0]);
        }
        else{
            $unidade->update(['status'=>1]);
        }

        return redirect()->route('unidades.index')
        ->with('success','Unidad Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidad $unidade)
    {
        $unidade->delete();

        return redirect()->route('unidades.index')
        ->with('success','Unidad Eliminada Correctamente');
    }

    /**
     * Search an item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $unidades=Unidad::search($request->value)->paginate(10);

        return view('inventario.unidades.index',compact('unidades'));
    }
}

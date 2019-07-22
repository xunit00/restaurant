<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidad;
use App\Http\Requests\UnidadRequest;


class UnidadController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth',
        // 'permission:update.unidades|create.unidades|delete.unidades|read.unidades']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades= Unidad::latest()->paginate(10);
        return view('unidades.index',compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidades.create');
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
        return view('unidades.edit',compact('unidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnidadRequest $request, Unidad $unidad)
    {
        // dd($request);
        $unidad->update($request->all());

        // $request->validate([
        //     'nombre_unidad'=>'required|string|min:4|max:50|unique:unidades,nombre_unidad,'.$id.'id',
        //     'descripcion_unidad'=>'nullable|string|min:4|max:191',
        //     'contenido' => 'required|integer',
        //     'status'=>'required|boolean'
        // ]);

        //   $unidad = Unidad::findOrFail($id);
        //   $unidad->nombre_unidad = $request->get('nombre_unidad');
        //   $unidad->descripcion_unidad = $request->get('descripcion_unidad');
        //   $unidad->contenido = $request->get('contenido');
        //   $unidad->status = $request->get('status');

        //   $unidad->save();

        return redirect()->route('unidades.index')
        ->with('success','Unidad Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unidades = Unidad::findOrFail($id);
        $unidades->delete();

        return redirect()->route('unidades.index')
        ->with('success','Unidad Eliminada Correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Mesa;
use App\Area;
use Illuminate\Http\Request;
use App\Traits\SearchTrait;
use App\Http\Requests\MesaRequest;

class MesaController extends Controller
{
    use SearchTrait;

    public function __construct()
    {
        $this->middleware(['auth',
        'permission:update.mesas|create.mesas|delete.mesas|read.mesas']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesas= Mesa::with('area')->latest()->paginate(10);

        return view('configuracion.mesas.index',compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Mesa $mesa)
    {
        $areas=Area::whereStatus(1)->pluck('nombre', 'id');
        return view('configuracion.mesas.create',compact('mesa','areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MesaRequest $request)
    {
        Mesa::create($request->all());

        return redirect()->route('mesas.index')
        ->with('success', 'Mesa Creada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mesa  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Mesa $mesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesa $mesa)
    {
        return view('configuracion.mesas.edit',compact('mesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function update(MesaRequest $request, Mesa $mesa)
    {
        $mesa->update($request->all());

        return redirect()->route('mesas.index')
        ->with('success','Mesa Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesa $mesa)
    {
        $mesa->delete();

        return redirect()->route('mesas.index')
        ->with('success','Mesa Eliminada Correctamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function update_status(Mesa $mesa)
    {
        if($mesa->status==1){
            $mesa->update(['status'=>0]);
        }
        else{
            $mesa->update(['status'=>1]);
        }

        return redirect()->route('mesas.index')
        ->with('success','Mesa Actualizada Correctamente');
    }

     /**
     * Search an item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $mesas=Mesa::search($request->value)->paginate(10);

        return view('configuracion.mesas.index',compact('mesas'));
    }
}

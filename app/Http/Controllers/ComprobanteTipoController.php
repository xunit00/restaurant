<?php

namespace App\Http\Controllers;

use App\Models\ComprobanteTipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ComprobanteRequest;

class ComprobanteTipoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth',
        'permission:update.comprobantes|create.comprobantes|delete.comprobantes|read.comprobantes']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprobanteTipo= ComprobanteTipo::latest()->paginate(10);
        return view('comprobantes.serietipo.index',compact('comprobanteTipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ComprobanteTipo $comprobanteTipo)
    {
        return view('comprobantes.serietipo.create',compact('comprobanteTipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComprobanteRequest $request)
    {
        ComprobanteTipo::create($request->all());

        return redirect()->route('comprobanteTipo.index')
        ->with('success', 'Comprobante Creado!');
    }

    public function update_status(ComprobanteTipo $comprobanteTipo)
    {
        if($comprobanteTipo->status==1){
            $comprobanteTipo->update(['status'=>0]);
        }
        else{
            $comprobanteTipo->update(['status'=>1]);
        }

        return redirect()->route('comprobanteTipo.index')
        ->with('success','Comprobante Actualizado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ComprobanteTipo  $comprobanteTipo
     * @return \Illuminate\Http\Response
     */
    public function show(ComprobanteTipo $comprobanteTipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ComprobanteTipo  $comprobanteTipo
     * @return \Illuminate\Http\Response
     */
    public function edit(ComprobanteTipo $comprobanteTipo)
    {
        return view('comprobantes.serietipo.edit',compact('comprobanteTipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ComprobanteTipo  $comprobanteTipo
     * @return \Illuminate\Http\Response
     */
    public function update(ComprobanteRequest $request, ComprobanteTipo $comprobanteTipo)
    {
        $comprobanteTipo->update($request->all());

        return redirect()->route('comprobanteTipo.index')
        ->with('success','Comprobante Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ComprobanteTipo  $comprobanteTipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComprobanteTipo $comprobanteTipo)
    {
        $comprobanteTipo->delete();

        return redirect()->route('comprobanteTipo.index')
        ->with('success','Comprobante Eliminado Correctamente');
    }

    /**
     * Search an item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $comprobanteTipo=ComprobanteTipo::search($request->value)->paginate(10);

        return view('comprobantes.serietipo.index',compact('comprobanteTipo'));
    }
}

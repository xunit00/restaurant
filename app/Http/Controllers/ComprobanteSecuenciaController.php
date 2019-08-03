<?php

namespace App\Http\Controllers;

use App\ComprobanteTipo;
use App\ComprobanteSecuencia;
use Illuminate\Http\Request;

class ComprobanteSecuenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprobanteSecuencia= ComprobanteSecuencia::latest()->paginate(10);
        return view('comprobantes.secuencia.index',compact('comprobanteSecuencia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ComprobanteSecuencia $comprobanteSecuencia)
    {
        $comprobanteTipo=ComprobanteTipo::whereStatus(1)->pluck('serie_tipo');
        return view('comprobantes.secuencia.create',compact('comprobanteTipo','comprobanteSecuencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

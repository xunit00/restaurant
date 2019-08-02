<?php

namespace App\Http\Controllers;

use App\ComprobanteTipo;
use App\ComprobanteSecuencia;
use Illuminate\Http\Request;

class ComprobanteTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprobantes= ComprobanteTipo::latest()->paginate(10);
        return view('comprobantes.index',compact('comprobantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ComprobanteTipo  $comprobanteTipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComprobanteTipo $comprobanteTipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ComprobanteTipo  $comprobanteTipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComprobanteTipo $comprobanteTipo)
    {
        //
    }
}

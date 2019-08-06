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
        $comprobanteTipo=ComprobanteTipo::whereStatus(1)->get();
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
        // $validatedData = $request->validate([
        //     'secuencia_inicial' => 'required|numeric|lt:'.$request->secuencia_final,
        //     'secuencia_final' => 'required|numeric|gt:'.$request->secuencia_inicial,
        //     'comprobante_id'=>'required|numeric',
        //     'fecha_expiracion'=>'sometimes|date'
        // ]);

        $valorinicial=$request->secuencia_inicial;
        $valorfinal=$request->secuencia_final;
       
        // for($v=$valorinicial; $v<=$valorfinal; $v++){
        //     $compSecuencia = new ComprobanteSecuencia([
        //         'secuencia'=>$v,
        //         'tipo_id'=>$request->comprobante_id,
        //         'fecha_vencimiento'=>$request->fecha_vencimiento
        //     ]);
        //     $compSecuencia->save();
        // }

        return redirect()->route('comprobanteSecuencia.index')
        ->with('success', 'Comprobante Creado!');
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

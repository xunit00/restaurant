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
        $comprobanteSecuencia= ComprobanteSecuencia::with('tipoComprobante')->latest()->paginate(10);

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
        $validatedData = $request->validate([
            'secuencia_inicial' => 'required|numeric|lt:'.$request->secuencia_final.'|unique:comprobante_secuencias,secuencia,'.$request->comprobante_id,
            'secuencia_final' => 'required|numeric|gt:'.$request->secuencia_inicial.'|unique:comprobante_secuencias,secuencia,'.$request->comprobante_id,
            'comprobante_id'=>'required|numeric',
            'fecha_vencimiento'=>'sometimes|date'
        ]);

        $valorinicial=$request->secuencia_inicial;
        $valorfinal=$request->secuencia_final;

        for($v=$valorinicial; $v<=$valorfinal; $v++){
            $secuencia=str_pad($v,6,"0",STR_PAD_LEFT);
            $compSecuencia = new ComprobanteSecuencia([
                'secuencia'=>$secuencia,
                'tipo_id'=>$request->comprobante_id,
                'fecha_vencimiento'=>$request->fecha_vencimiento
            ]);
            $compSecuencia->save( $validatedData);
        }

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
        $secuencia = ComprobanteSecuencia::findOrFail($id);
        $secuencia->delete();

        return redirect()->route('comprobanteSecuencia.index')
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
        $comprobanteTipo=ComprobanteSecuencia::with('tipoComprobante')->search($request->value)->paginate(10);

        return view('comprobantes.serietipo.index',compact('comprobanteTipo'));
    }

    /**
     * Update the status in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ComprobanteSecuencia  $comprobanteSecuencia
     * @return \Illuminate\Http\Response
     */
    public function update_status(ComprobanteSecuencia $comprobanteSecuencia)
    {
        if($comprobanteSecuencia->status==1){
            $comprobanteSecuencia->update(['status'=>0]);
        }
        else{
            $comprobanteSecuencia->update(['status'=>1]);
        }

        return redirect()->route('comprobanteSecuencia.index')
        ->with('success','Comprobante Actualizado Correctamente');
    }
}

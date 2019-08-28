<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\TransaccionInventario;
use App\TransaccionInventarioDetalle;
use Illuminate\Http\Request;

class TransaccionInventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transacciones=TransaccionInventario::latest()->paginate(10);
        return view('inventario.entrada-salida.index', compact('transacciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumos = Insumo::all();

        return view('inventario.entrada-salida.create', compact('insumos'));
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
     * @param  \App\TransaccionInventario  $transaccionInventario
     * @return \Illuminate\Http\Response
     */
    public function show(TransaccionInventario $transaccionInventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaccionInventario  $transaccionInventario
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaccionInventario $transaccionInventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaccionInventario  $transaccionInventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaccionInventario $transaccionInventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaccionInventario  $transaccionInventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaccionInventario $transaccionInventario)
    {
        //
    }
}

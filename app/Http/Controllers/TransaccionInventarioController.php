<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\TransaccionInventario;
use App\Models\TransaccionInventarioDetalle;
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
        DB::beginTransaction();
        try {
            $transaccion_id = DB::table('recetas')->insertGetId(
                array(
                    'tipo_transaccion' => $request->tipo_transaccion,
                    'usuario_id' => $request->usuario,
                    'concepto' => $request->concepto,
                    'fecha' => Carbon::now(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                )
            );

            $insumos = $request->detalles;

            foreach ($insumos as $ins) {
                TransaccionInventarioDetalle::create([
                    'transaccion_id' => $transaccion_id,
                    'insumo_id' => $ins['insumo'],
                    'cantidad' => $ins['cantidad']
                ]);
            }
            DB::commit();

            return ['message' => 'Transaccion Creada'];

        } catch (\Throwable $th) {
            DB::rollBack();
        }
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

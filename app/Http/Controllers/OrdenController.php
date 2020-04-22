<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\DetalleReceta;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Orden;


use Illuminate\Http\Request;

class OrdenController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $ordenes = Orden::latest()->paginate(10);

        return view('configuracion.pedidos.index');//, compact('ordenes'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {
        //$areas=Area::whereStatus(1)->pluck('nombre', 'id');
        return view('configuracion.pedidos.create');//,compact('mesa','areas'));
    }

    /**
     * genera listado de platos segun calorias
     *
     * @return \Illuminate\Http\Response
     */
    public function generar(Request $request)
    {
        $calorias_porcomida =($request->cal)/3;//dividar la cantidad de calorias por dias en 3 partes

        $platos = DetalleReceta::selectRaw('productos.id,productos.nombre,0 as cantidad, sum((insumos.calorias * receta_detalles.cantidad)/100) calorias')
        ->leftjoin('recetas', 'receta_detalles.receta_id', '=', 'recetas.id')
        ->leftjoin('insumos', 'insumos.id', '=', 'receta_detalles.insumo_id')
        ->leftjoin('productos', 'productos.id', '=', 'recetas.producto_id')
        ->groupBy('recetas.producto_id')
        ->having('calorias','<=', $calorias_porcomida)
        ->orderBy('calorias', 'DESC')
        ->get();

        return $platos;
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
            $orden_id = DB::table('ordens')->insertGetId(
                array(
                    'producto_id' => $request->producto,
                    'descripcion' => $request->descripcion,
                    'porciones' => $request->porciones,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                )
            );

            $insumos = $request->detalles;
            // dd($insumos);

            foreach ($insumos as $ins) {
                $insumo_id = Preparacion::where('id', $ins['preparacion_id'])->first()->insumo_id;

                // $tiempo_preparacion = Preparacion::where('id', $ins['preparacion_id'])->first()->insumo_id;

                DetalleReceta::create([
                    'receta_id' => $receta_id,
                    'insumo_id' => $insumo_id,
                    'cantidad' => $ins['cantidad'],
                    'tipo_preparacion' => $ins['preparacion_id']
                ]);
            }
            DB::commit();

            return ['message' => 'Receta Creada'];
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th], 422);
        }

    }
}

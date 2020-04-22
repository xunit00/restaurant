<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\DetalleReceta;
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

        $platos = DetalleReceta::selectRaw('productos.nombre, sum((insumos.calorias * receta_detalles.cantidad)/100) calorias')
        ->leftjoin('recetas', 'receta_detalles.receta_id', '=', 'recetas.id')
        ->leftjoin('insumos', 'insumos.id', '=', 'receta_detalles.insumo_id')
        ->leftjoin('productos', 'productos.id', '=', 'recetas.producto_id')
        ->groupBy('recetas.producto_id')
        ->having('calorias','<=', $calorias_porcomida)
        ->orderBy('calorias', 'DESC')
        ->get();

        return $platos;
    }
}

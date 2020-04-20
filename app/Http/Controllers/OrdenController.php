<?php

namespace App\Http\Controllers;

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
}

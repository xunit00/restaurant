<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\User;
use App\Plato;
use App\NotaVenta;
use App\Traits\SearchTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotaVentaController extends Controller
{
    use SearchTrait;

    public function __construct()
    {
        $this->middleware(['auth',
        'permission:update.notaVenta|create.notaVenta|delete.notaVenta|read.notaVenta']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes= User::role('Cliente')->get();
        $categorias=Categoria::with('platos')->whereStatus(1)->get();
        return view('ventas.notaventa.index',compact('clientes','categorias'));
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
        $vendedor= Auth::id();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NotaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function show($categoria)
    {
        return Plato::whereCategoria_id($categoria)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NotaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function edit(NotaVenta $notaVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NotaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotaVenta $notaVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NotaVenta  $notaVenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotaVenta $notaVenta)
    {
        //
    }
}

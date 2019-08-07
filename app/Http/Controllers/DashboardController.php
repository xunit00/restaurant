<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use App\Unidad;
use App\Plato;
use App\ComprobanteSecuencia;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryCount = Categoria::count();
        $productCount = Producto::count();
        $unidadCount = Unidad::count();
        $platoCount = Plato::count();
        $ncfConsumidor = ComprobanteSecuencia::whereStatus(1)->count();
        $ncfCreditoF = ComprobanteSecuencia::whereStatus(1)->count();

        return view('dashboard',
        compact('categoryCount','productCount','unidadCount','platoCount','ncfConsumidor','ncfCreditoF'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriasProducto;
use App\Models\Producto;
use App\Models\Insumo;
use App\Models\Unidad;
use App\Http\Controllers\Controller;
use App\Models\Plato;
use App\Models\ComprobanteSecuencia;

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
        $categoryCount = CategoriasProducto::count();
        $productCount = Insumo::count();
        $unidadCount = Unidad::count();
        $platoCount = Producto::count();
        $ncfConsumidor = ComprobanteSecuencia::whereStatus(1)->count();
        $ncfCreditoF = ComprobanteSecuencia::whereStatus(1)->count();

        return view('dashboard',
        compact('categoryCount','productCount','unidadCount','platoCount','ncfConsumidor','ncfCreditoF'));
    }
}

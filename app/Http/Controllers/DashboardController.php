<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use App\Unidad;


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
        $productCount=Producto::count();
        $unidadCount=Unidad::count();

        return view('dashboard',compact('categoryCount','productCount','unidadCount'));
    }
}

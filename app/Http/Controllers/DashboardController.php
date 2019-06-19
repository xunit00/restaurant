<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

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
        return view('dashboard',compact('categoryCount'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Unidad;
use App\Producto;
use App\Categoria;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductoRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductoController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth',
        // 'permission:update.productos|create.productos|delete.productos|read.productos']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod_unidad = Unidad::with('productos')->latest()->paginate(10);
        $productos = Producto::latest()->paginate(10);
        return view('productos.index', compact('productos','prod_unidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all()->pluck('nombre', 'id');
        // $unidades = Unidad::all()->pluck('nombre_unidad', 'id');
        return view('productos.create', compact('categorias', 'unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto Creado!');
    }

    /**
     * muestra form para crear unnuevo recurso de producto y unidad
     *
     * @return \Illuminate\Http\Response
     */
    public function create_produnid()
    {
        $productos = Producto::all()->pluck('nombre_producto', 'id');
        $unidades = Unidad::all()->pluck('nombre_unidad', 'id');
        return view('productos.unidad.create', compact('productos', 'unidades'));
    }

    /**
     * guarda en store el nuevo recurso de prod unidad
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_produnid(Request $request)
    {
        $producto = Producto::findOrFail($request->producto_id);

        $producto->unidad()->attach($request->unidad_id, [
            'cantidad' => $request->cantidad,
            'precio_venta' => $request->precio_venta,
            'costo' => $request->costo,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('productos.index')
        ->with('success', 'Producto Unidad Creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all()->pluck('nombre', 'id');
        $unidades = Unidad::all()->pluck('nombre_unidad', 'id');
        return view('productos.edit', compact('producto', 'categorias', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, Producto $producto)
    {
        $producto->update($request->all());
        return redirect()->route('productos.index')
            ->with('success', 'Producto Actualizado Correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_produnid($prod_unidad)
    {
        $prod_unidad=Unidad::with('productos')->find($prod_unidad);
        // dd($prod_unidad);
        $productos = Producto::all()->pluck('nombre_producto','id');
        $unidades = Unidad::all()->pluck('nombre_unidad','id');
        return view('productos.unidad.edit', compact('productos','unidades','prod_unidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_produnid(Request $request, Unidad $prod_unidad)
    {
        // $producto->update($request->all());
        // return redirect()->route('productos.index')
        //     ->with('success', 'Producto Actualizado Correctamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

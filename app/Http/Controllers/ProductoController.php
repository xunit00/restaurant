<?php

namespace App\Http\Controllers;

use App\Unidad;
use App\Producto;
use App\Categoria;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductoRequest;
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
        $productos = Producto::latest()->paginate(10);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all()->pluck('nombre', 'id');
        $unidades = Unidad::all()->pluck('nombre_unidad', 'id');
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

    public function store_produnid(ProductoRequest $request, $id_producto)
    {
        DB::beginTransaction();

        try {

            $producto = Producto::findOrFail($id_producto);

            $producto->unidad()->attach($request->id_unidad, [
                'cantidad' => $request->cantidad,
                'precio_venta' => $request->precio_venta,
                'costo' => $request->costo,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            DB::commit();

            return redirect()->route('productos.index')
                ->with('success', 'Producto/Unidad Creado!');
        } catch (\Throwable $th) {

            DB::rollBack();

            return redirect()->route('productos.index')
                ->with('errors', $th->getMessage());
        }
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

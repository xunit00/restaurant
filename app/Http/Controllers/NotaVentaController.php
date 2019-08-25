<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Producto;
use App\Models\NotaVenta;
use Carbon\Carbon;
use App\Models\CategoriasProducto;
use App\Models\DetalleNotaVenta;
use App\Traits\SearchTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotaVentaController extends Controller
{
    use SearchTrait;

    public function __construct()
    {
        $this->middleware([
            'auth',
            'permission:update.notaVenta|create.notaVenta|delete.notaVenta|read.notaVenta'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = User::role('Cliente')->get();
        $categorias = Categoria::with('platos')->whereStatus(1)->get();
        return view('ventas.notaventa.index', compact('clientes', 'categorias'));
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
        try {
            DB::beginTransaction();

            $notaVenta_id = DB::table('nota_ventas')->insertGetId(
                array(
                    'cliente_id' => $request->cliente,
                    'usuario_id' => Auth::id(),
                    'fecha' => Carbon::now(),
                    'total' => $request->total,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                )
            );

            $productos = $request->detalles;

            foreach ($productos as $prod) {
                $detalle = new DetalleNotaVenta();
                $detalle->nota_venta_id = $notaVenta_id;
                $detalle->producto_id = $prod['id'];
                $detalle->cantidad = $prod['cantidad'];
                $detalle->precio = $prod['precio'];
                $detalle->descuento = $prod['descuento'];
                $detalle->save();
            }
            DB::commit();

            return ['Mensaje'=>'Nota de Venta Insertada'];

        } catch (Exception $e) {
            DB::rollBack();
        }
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
     * Display the specified pdf report.
     *
     *
     *
     */
    public function reportPDF()
    {
        $venta=NotaVenta::all();

        $cont=NotaVenta::count();

        $detalle=DetalleNotaVenta::all();

        $pdf=\PDF::loadView('PDF.notaVentaPDF',['venta'=>$venta,'cont'=>$cont]);

        return $pdf->download('notaVenta.pdf');

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

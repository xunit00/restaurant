<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use App\Models\Insumo;
use App\Models\DetalleReceta;
use App\Models\Producto;
use App\Preparacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RecetaRequest;

class RecetaController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth',
            'permission:update.recetas|create.recetas|delete.recetas|read.recetas'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = Receta::with('producto')->latest()->paginate(10);

        return view('configuracion.recetas.index', compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Receta $receta)
    {
        // $insumos = DB::select( DB::raw("SELECT preparacions.id as preparacion_id,insumos.id as insumo_id,concat( insumos.nombre,' ',preparacions.tipo_preparacion) as Insumo
        // FROM preparacions
        // RIGHT JOIN insumos
        // on preparacions.insumo_id=insumos.id
        // ORDER BY `preparacions`.`id` ASC") );//Insumo::all();
        $insumos=Preparacion::selectRaw("SELECT preparacions.id as preparacion_id,insumos.id as insumo_id,concat( insumos.nombre,' ',preparacions.tipo_preparacion) as Insumo")
        ->rightJoin('insumos','preparacions.insumo_id','=','insumos.id')
        ->get();


        $productos = Producto::whereStatus(1)->get();

        dd($insumos);

        return view('configuracion.recetas.create',compact('insumos','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecetaRequest $request)
    {
        DB::beginTransaction();
        try {
            $receta_id = DB::table('recetas')->insertGetId(
                array(
                    'producto_id' => $request->producto,
                    'descripcion' => $request->descripcion,
                    'porciones' => $request->porciones,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                )
            );

            $insumos = $request->detalles;

            foreach ($insumos as $ins) {
                $insumo_id = Insumo::where('nombre', $ins['insumo'])->first()->id;
                DetalleReceta::create([
                    'receta_id' => $receta_id,
                    'insumo_id' => $insumo_id,
                    'cantidad' => $ins['cantidad'],
                    'tipo_preparacion' => $ins['tipo_preparacion']
                ]);
            }
            DB::commit();

            return ['message' => 'Receta Creada'];
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        return view('configuracion.recetas.create', compact('receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Receta  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update_status(Receta $receta)
    {
        if ($receta->status == 1) {
            $receta->update(['status' => 0]);
        } else {
            $receta->update(['status' => 1]);
        }

        return redirect()->route('recetas.index')
            ->with('success', 'Receta Actualizada Correctamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        $receta->delete();

        return redirect()->route('recetas.index')
            ->with('success', 'Receta Eliminada Correctamente');
    }
}

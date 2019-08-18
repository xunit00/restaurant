<?php

namespace App\Http\Controllers;

use App\Receta;
use App\Producto;
use App\DetalleReceta;
use App\Plato;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\RecetaRequest;

class RecetaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth',
        'permission:update.recetas|create.recetas|delete.recetas|read.recetas']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = Receta::with('plato')->latest()->paginate(10);

        return view('configuracion.recetas.index', compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Receta $receta)
    {
        $platos=Plato::all();
        $productos=Producto::all();
        return view('configuracion.recetas.create',compact('receta','productos','platos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecetaRequest $request)
    {

            $receta_id= DB::table('recetas')->insertGetId(
                array('plato_id' => $request->plato,
                'descripcion' => $request->descripcion,
                'porciones'=> $request->porciones,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now())
            );

            $productos=$request->detalles;

            foreach($productos as $prod)
            {
                DetalleReceta::create([
                    'receta_id'=>$receta_id,
                    'producto_id'=>$prod['producto'],
                    'cantidad'=>$prod['cantidad']
                ]);
            }



            return ['message'=> 'Receta Creada'];

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
        return view('configuracion.recetas.create',compact('receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Receta  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update_status(Receta $receta)
    {
        if($receta->status==1){
            $receta->update(['status'=>0]);
        }
        else{
            $receta->update(['status'=>1]);
        }

        return redirect()->route('recetas.index')
        ->with('success','Receta Actualizada Correctamente');
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
        ->with('success','Receta Eliminada Correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Traits\SearchTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;

class AreaController extends Controller
{
    use SearchTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Area::latest()->paginate(10);
        // return view('configuracion.areas.index',compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Area $area)
    {
        return view('configuracion.areas.create',compact('area'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        Area::create($request->all());

        return redirect()->route('areas.index')
        ->with('success', 'Area Creada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        return view('configuracion.areas.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, Area $area)
    {
        $area->update($request->all());

        return redirect()->route('areas.index')
        ->with('success','Area Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('areas.index')
        ->with('success','Area Eliminada Correctamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update_status(Area $area)
    {
        if($area->status==1){
            $area->update(['status'=>0]);
        }
        else{
            $area->update(['status'=>1]);
        }

        return redirect()->route('areas.index')
        ->with('success','Area Actualizada Correctamente');
    }

     /**
     * Search an item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $areas=Area::search($request->value)->paginate(10);

        return view('configuracion.areas.index',compact('areas'));
    }
}

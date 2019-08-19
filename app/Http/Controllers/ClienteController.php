<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ClienteRequest;


class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth',
        'permission:update.clientes|create.clientes|delete.clientes|read.clientes']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes= User::role('Cliente')->latest()->paginate(10);
        return view('ventas.clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $cliente)
    {
        return view('ventas.clientes.create',compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        DB::beginTransaction();
        try {
         $user=User::create([
            'name'=>$request['name'],
            'email'=>$request['username'].'@restaurant.com',
            'username'=>$request['username'],
            'password'=>Hash::make(12345678),
            'dni'=>$request['dni'],
            'direccion'=>$request['direccion'],
            'telefono'=>$request['telefono'],
        ]);
        DB::commit();
            $user->assignRole('Cliente');
             return redirect()->route('clientes.index')
             ->with('success', 'Cliente Creado!');
            } catch (\Throwable $th) {

                DB::rollBack();

                return redirect()->route('clientes.create')
                    ->with('errors', $th->getMessage());
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $cliente)
    {
        return view('ventas.clientes.show',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $cliente)
    {
        return view('ventas.clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request,User $cliente)
    {
        $cliente->update($request->all());

        return redirect()->route('clientes.index')
        ->with('success','Cliente Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $cliente)
    {
        $cliente->removeRole('Cliente');
        $cliente->delete();
        return redirect()->route('clientes.index')
        ->with('success','Cliente Eliminado Correctamente');
    }

     /**
     * Search an item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $clientes=User::role('cliente')->search($request->value)->paginate(10);

        return view('ventas.clientes.index',compact('clientes'));
    }
}

<?php

namespace App\Http\Controllers;
use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth',
        'permission:update.users|create.users|delete.users|read.users']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::with('roles')->latest()->paginate(10);
        return view('users.index',compact('users'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles= Role::all()->pluck('name','id');
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
         $user=User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'username'=>$request['username'],
            'password'=>Hash::make($request['password']),
        ]);
        if($user){
            $user->assignRole($request->rol);
             return redirect()->route('users.index')
             ->with('success', 'User Creado!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $my_perm=$user->permissions()->pluck('name','id');//muestra permisos dados directamente

        $permissions=Permission::all()->pluck('name','id');
        $roles= Role::all()->pluck('name','id');
        return view('users.show',compact('user','roles','permissions','my_perm'));
    }

 /**
     * Show the form for editing the specified resource.
     *
     * @param   int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles= Role::all()->pluck('name','id');
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request,User $user)
    {
        $user->syncRoles($request->rol);
        $user->update($request->all());

        return redirect()->route('users.index')
        ->with('success','Usuario Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->removeRole($user->roles->implode('name', ', '));
        $user->delete();
        return redirect()->route('users.index')
        ->with('success','User Eliminado Correctamente');
    }
    public function manage_permissions(Request $request,$id)
    {
        $this->validate($request,['permission'=>'required']);
        $new_permission=$request->permission;
        $user = User::findOrFail($id);
        $old_permission= $user->getDirectPermissions();


        // dd($old_permission);
        // dd($new_permission);

        foreach($old_permission as $perm_old){
            foreach($new_permission as $permiso_new){

                if(!$permiso_new==$perm_old){
                    $user->givePermissionTo($permiso_new);
                }else{
                    $user->givePermissionTo($perm_old);
                }
            }
            // if(!$user->hasPermissionTo($permiso)){
            //     $user->givePermissionTo($permiso);
            // }elseif($user->hasPermissionTo($permiso)){
            //     $user->syncPermissions($permiso);
            // }else{
            //     $user->revokePermissionTo($permiso);
            // }
        }

        return redirect()->route('users.index')
        ->with('success','Permisos de Usuario actualizado Correctamente');
    }
}

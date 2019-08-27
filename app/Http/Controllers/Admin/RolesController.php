<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['api',
        'permission:update.role|create.role|delete.role|read.role']);
        $this->middleware(['permission:read.role'])->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->paginate(10);

        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        $my_perm= Permission::role($role)->get()->pluck('name','id');
        $permissions=Permission::all()->pluck('name','id');
        return view('admin.roles.create',compact('permissions','my_perm','role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required','permission'=>'required']);

        $rol=Role::create(['name'=>$request['name']]);

        $permission=$request->permission;

        $rol->givePermissionTo($permission);

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
    public function edit(Role $role)
    {
        $my_perm= Permission::role($role)->get()->pluck('name','id');

        $permissions=Permission::all()->pluck('name','id');

        return view('admin.roles.edit',compact('role','permissions','my_perm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request,['name'=>'required','permission'=>'required']);

        $role->update(['name'=>$request->name]);

        $permission=$request->permission;

        $role->syncPermissions($permission);

        return redirect()->route('roles.index')
        ->with('success', 'Rol Actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $permissions = Permission::all();

        $role->revokePermissionTo($permissions)->delete();

        return ['message' => 'Informacion Borrado'];
    }

    /**
     * Search an item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $roles = Role::search($request->value)->paginate(10);

        return view('admin.roles.index', compact('roles'));
    }
}

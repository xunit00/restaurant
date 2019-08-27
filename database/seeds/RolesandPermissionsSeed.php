<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesandPermissionsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'update.users']);
        Permission::create(['name' => 'delete.users']);
        Permission::create(['name' => 'create.users']);
        Permission::create(['name' => 'read.users']);

        Permission::create(['name' => 'update.role']);
        Permission::create(['name' => 'delete.role']);
        Permission::create(['name' => 'create.role']);
        Permission::create(['name' => 'read.role']);

        Permission::create(['name' => 'read.permissions']);

        Permission::create(['name' => 'update.categorias']);
        Permission::create(['name' => 'delete.categorias']);
        Permission::create(['name' => 'create.categorias']);
        Permission::create(['name' => 'read.categorias']);

        Permission::create(['name' => 'update.unidades']);
        Permission::create(['name' => 'delete.unidades']);
        Permission::create(['name' => 'create.unidades']);
        Permission::create(['name' => 'read.unidades']);

        Permission::create(['name' => 'update.productos']);
        Permission::create(['name' => 'delete.productos']);
        Permission::create(['name' => 'create.productos']);
        Permission::create(['name' => 'read.productos']);

        Permission::create(['name' => 'update.comprobantes']);
        Permission::create(['name' => 'delete.comprobantes']);
        Permission::create(['name' => 'create.comprobantes']);
        Permission::create(['name' => 'read.comprobantes']);

        Permission::create(['name' => 'update.areas']);
        Permission::create(['name' => 'delete.areas']);
        Permission::create(['name' => 'create.areas']);
        Permission::create(['name' => 'read.areas']);

        Permission::create(['name' => 'update.mesas']);
        Permission::create(['name' => 'delete.mesas']);
        Permission::create(['name' => 'create.mesas']);
        Permission::create(['name' => 'read.mesas']);

        Permission::create(['name' => 'update.insumos']);
        Permission::create(['name' => 'delete.insumos']);
        Permission::create(['name' => 'create.insumos']);
        Permission::create(['name' => 'read.insumos']);

        Permission::create(['name' => 'update.recetas']);
        Permission::create(['name' => 'delete.recetas']);
        Permission::create(['name' => 'create.recetas']);
        Permission::create(['name' => 'read.recetas']);

        Permission::create(['name' => 'update.clientes']);
        Permission::create(['name' => 'delete.clientes']);
        Permission::create(['name' => 'create.clientes']);
        Permission::create(['name' => 'read.clientes']);

        Permission::create(['name' => 'update.notaVenta']);
        Permission::create(['name' => 'delete.notaVenta']);
        Permission::create(['name' => 'create.notaVenta']);
        Permission::create(['name' => 'read.notaVenta']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'Cliente']);

        $role = Role::create(['name' => 'Cajero'])
        ->givePermissionTo(['read.clientes','create.clientes','update.clientes',
        'create.comprobantes', 'read.comprobantes', 'update.comprobantes', 'delete.comprobantes']);

        $role = Role::create(['name' => 'Mesero'])
        ->givePermissionTo(['create.users', 'read.users']);

        $role = Role::create(['name' => 'Gerente'])
        ->givePermissionTo(Permission::all())
        ->revokePermissionTo(['read.role','update.role','delete.role','create.role','read.permissions']);

        $role = Role::create(['name' => 'Cocinero'])
        ->givePermissionTo(['create.insumos', 'read.insumos', 'update.insumos', 'delete.insumos',
        'create.recetas', 'read.recetas', 'update.recetas', 'delete.recetas']);

        $role = Role::create(['name' => 'Super-Admin'])
        ->givePermissionTo(Permission::all());
    }
}

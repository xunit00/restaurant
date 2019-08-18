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

        Permission::create(['name' => 'update.permissions']);
        Permission::create(['name' => 'delete.permissions']);
        Permission::create(['name' => 'create.permissions']);
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

        Permission::create(['name' => 'update.platos']);
        Permission::create(['name' => 'delete.platos']);
        Permission::create(['name' => 'create.platos']);
        Permission::create(['name' => 'read.platos']);

        Permission::create(['name' => 'update.recetas']);
        Permission::create(['name' => 'delete.recetas']);
        Permission::create(['name' => 'create.recetas']);
        Permission::create(['name' => 'read.recetas']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'Cliente']);

        $role = Role::create(['name' => 'Cajero'])
        ->givePermissionTo(['read.users',
        'create.comprobantes', 'read.comprobantes', 'update.comprobantes', 'delete.comprobantes']);

        $role = Role::create(['name' => 'Mesero'])
        ->givePermissionTo(['create.users', 'read.users']);

        $role = Role::create(['name' => 'Gerente'])
        ->givePermissionTo(['create.users', 'read.users','update.users','delete.users',
        'create.categorias', 'read.categorias', 'update.categorias', 'delete.categorias',
        'create.unidades', 'read.unidades', 'update.unidades', 'delete.unidades',
        'create.productos', 'read.productos', 'update.productos', 'delete.productos',
        'create.comprobantes', 'read.comprobantes', 'update.comprobantes', 'delete.comprobantes',
        'create.areas', 'read.areas', 'update.areas', 'delete.areas',
        'create.mesas', 'read.mesas', 'update.mesas', 'delete.mesas',
        'create.platos', 'read.platos', 'update.platos', 'delete.platos',
        'create.recetas', 'read.recetas', 'update.recetas', 'delete.recetas']);

        $role = Role::create(['name' => 'Cocinero'])
        ->givePermissionTo(['create.platos', 'read.platos', 'update.platos', 'delete.platos',
        'create.recetas', 'read.recetas', 'update.recetas', 'delete.recetas']);

        $role = Role::create(['name' => 'Super-Admin'])
        ->givePermissionTo(Permission::all());
    }
}

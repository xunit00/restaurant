<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesandPermissions extends Seeder
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

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo('read.users');

        // or may be done by chaining
        $role = Role::create(['name' => 'moderador'])
            ->givePermissionTo(['create.users', 'read.users']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}

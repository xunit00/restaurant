<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesandPermissions::class,
            UsersTable::class,
            StatusesTable::class,
            CategoriasTable::class,
            UnidadTable::class
        ]);
    }
}

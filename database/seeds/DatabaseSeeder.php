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
            RolesandPermissionsSeed::class,
            UsersSeed::class,
            StatusesTable::class,
            CategoriasSeed::class,
            UnidadesSeed::class
        ]);
    }
}

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
            CategoriasInsumoSeed::class,
            CategoriasProductoSeed::class,
            UnidadesSeed::class,
            AreasSeed::class,
            MesasSeed::class,
            InsumoSeed::class,
            PreparacionesInsumosSeed::class
        ]);
    }
}

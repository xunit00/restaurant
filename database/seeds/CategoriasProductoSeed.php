<?php

use Illuminate\Database\Seeder;
use App\Models\CategoriasProducto;

class CategoriasProductoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriasProducto::create([
            'nombre'=>'Guisos',
            'descripcion'=>''
        ]);

        CategoriasProducto::create([
            'nombre'=>'Al Carbon',
            'descripcion'=>''
        ]);

        CategoriasProducto::create([
            'nombre'=>'Fritos',
            'descripcion'=>''
        ]);

        CategoriasProducto::create([
            'nombre'=>'Bebidas',
            'descripcion'=>''
        ]);

        CategoriasProducto::create([
            'nombre'=>'Otros',
            'descripcion'=>''
        ]);
    }
}

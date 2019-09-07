<?php

use Illuminate\Database\Seeder;
use App\Models\CategoriasInsumo;

class CategoriasInsumoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriasInsumo::create([
            'nombre'=>'Carnes',
            'descripcion'=>'carnes rojas o blancas'
        ]);

        CategoriasInsumo::create([
            'nombre'=>'Pescados y Mariscos',
            'descripcion'=>'productos del mar'
        ]);

        CategoriasInsumo::create([
            'nombre'=>'Cereal',
            'descripcion'=>'plantas de grano'
        ]);

        CategoriasInsumo::create([
            'nombre'=>'Frutas y Vegetales',
            'descripcion'=>''
        ]);

        CategoriasInsumo::create([
            'nombre'=>'Otros',
            'descripcion'=>''
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre'=>'Carnes',
            'descripcion'=>'carnes rojas o blancas'
        ]);

        Categoria::create([
            'nombre'=>'Pescados y Mariscos',
            'descripcion'=>'productos del mar'
        ]);

        Categoria::create([
            'nombre'=>'Cereal',
            'descripcion'=>'plantas de grano'
        ]);

        Categoria::create([
            'nombre'=>'Verduras y Vegetales',
            'descripcion'=>''
        ]);

        Categoria::create([
            'nombre'=>'Otros',
            'descripcion'=>''
        ]);
    }
}

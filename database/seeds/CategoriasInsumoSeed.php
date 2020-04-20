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
        CategoriasInsumo::create([//1
            'nombre'=>'Carnes',
            'descripcion'=>'Rojas y Blancas'
        ]);

        CategoriasInsumo::create([//2
            'nombre'=>'Pescados y Mariscos',
            'descripcion'=>'productos del mar'
        ]);

        CategoriasInsumo::create([//3
            'nombre'=>'Cereal',
            'descripcion'=>'plantas de grano'
        ]);

        CategoriasInsumo::create([//4
            'nombre'=>'Frutas',
            'descripcion'=>''
        ]);

        CategoriasInsumo::create([//5
            'nombre'=>'Vegetales',
            'descripcion'=>''
        ]);

        CategoriasInsumo::create([//6
            'nombre'=>'Verduras',
            'descripcion'=>''
        ]);

        CategoriasInsumo::create([//7
            'nombre'=>'Otros',
            'descripcion'=>''
        ]);

        CategoriasInsumo::create([//8
            'nombre'=>'Condimentos',
            'descripcion'=>''
        ]);

        CategoriasInsumo::create([//9
            'nombre'=>'Legumbres',
            'descripcion'=>''
        ]);
    }
}

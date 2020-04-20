<?php

use Illuminate\Database\Seeder;
use App\Models\Unidad;

class UnidadesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidad::create([//1
            'nombre'=>'Unidad',
            'descripcion'=>'valor unitario'
        ]);

        Unidad::create([//2
            'nombre'=>'Pares',
            'descripcion'=>'paquete de 2 unidades'
        ]);

        Unidad::create([//3
            'nombre'=>'Libra',
            'descripcion'=>'peso de producto'
        ]);

        Unidad::create([//4
            'nombre'=>'Onzas',
            'descripcion'=>'volumen de producto'
        ]);

        Unidad::create([//5
            'nombre'=>'Galon',
            'descripcion'=>'volumen de producto'
        ]);

        Unidad::create([//6
            'nombre'=>'Gramos',
            'descripcion'=>'peso de producto'
        ]);
    }
}

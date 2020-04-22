<?php

use Illuminate\Database\Seeder;
use App\Models\Producto;

class PlatosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre'=>'Chofan',
            'descripcion'=>'test',
            'categoria_id'=>'5',
            'precio'=>'100'
        ]);

        Producto::create([
            'nombre'=>'Pollo Frito',
            'descripcion'=>'con algo',
            'categoria_id'=>'3',
            'precio'=>'100'
        ]);

        Producto::create([
            'nombre'=>'Chuletas de Cerdo al carbon',
            'descripcion'=>'con algo',
            'categoria_id'=>'2',
            'precio'=>'150.5'
        ]);

        Producto::create([
            'nombre'=>'Estofado de Bistec',
            'descripcion'=>'con algo',
            'categoria_id'=>'1',
            'precio'=>'200.6'
        ]);
    }
}


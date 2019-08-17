<?php

use Illuminate\Database\Seeder;
use App\Unidad;

class UnidadesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidad::create([
            'nombre'=>'Unidad',
            'descripcion'=>'valor unitario'
        ]);

        Unidad::create([
            'nombre'=>'Pares',
            'descripcion'=>'paquete de 2 unidades'
        ]);

        Unidad::create([
            'nombre'=>'Libra',
            'descripcion'=>'peso de producto'
        ]);
    }
}

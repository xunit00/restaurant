<?php

use Illuminate\Database\Seeder;
use App\Unidad;

class UnidadTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidad::create([
            'nombre_unidad'=>'Unidad',
            'contenido'=>'1',
            'descripcion_unidad'=>'valor unitario'
        ]);

        Unidad::create([
            'nombre_unidad'=>'Pares',
            'contenido'=>'2',
            'descripcion_unidad'=>'paquete de 2 unidades'
        ]);

        Unidad::create([
            'nombre_unidad'=>'Libra',
            'contenido'=>'1',
            'descripcion_unidad'=>'peso de producto'
        ]);
    }
}

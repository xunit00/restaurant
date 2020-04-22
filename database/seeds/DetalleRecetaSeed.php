<?php

use Illuminate\Database\Seeder;
use App\Models\DetalleReceta;

class DetalleRecetaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //receta 1
        DetalleReceta::create([
            'receta_id'=>'1',
            'insumo_id'=>'36',
            'cantidad'=>'50',
            'tipo_preparacion'=>'63'
        ]);
        DetalleReceta::create([
            'receta_id'=>'1',
            'insumo_id'=>'38',
            'cantidad'=>'50',
            'tipo_preparacion'=>'70'
        ]);
        DetalleReceta::create([
            'receta_id'=>'1',
            'insumo_id'=>'29',
            'cantidad'=>'15',
            'tipo_preparacion'=>'49'
        ]);DetalleReceta::create([
            'receta_id'=>'1',
            'insumo_id'=>'30',
            'cantidad'=>'25',
            'tipo_preparacion'=>'50'
        ]);DetalleReceta::create([
            'receta_id'=>'1',
            'insumo_id'=>'1',
            'cantidad'=>'3',
            'tipo_preparacion'=>'1'
        ]);DetalleReceta::create([
            'receta_id'=>'1',
            'insumo_id'=>'13',
            'cantidad'=>'1',
            'tipo_preparacion'=>'18'
        ]);DetalleReceta::create([
            'receta_id'=>'1',
            'insumo_id'=>'27',
            'cantidad'=>'4',
            'tipo_preparacion'=>'44'
        ]);DetalleReceta::create([
            'receta_id'=>'1',
            'insumo_id'=>'25',
            'cantidad'=>'4',
            'tipo_preparacion'=>'36'
        ]);

        //receta 2
    }
}

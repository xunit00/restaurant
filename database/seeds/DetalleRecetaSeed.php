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
        ]);DetalleReceta::create([
            'receta_id'=>'1',
            'insumo_id'=>'38',
            'cantidad'=>'50',
            'tipo_preparacion'=>'70'
        ]);DetalleReceta::create([
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
        DetalleReceta::create([
            'receta_id'=>'2',
            'insumo_id'=>'36',
            'cantidad'=>'100',
            'tipo_preparacion'=>'61'
        ]);DetalleReceta::create([
            'receta_id'=>'2',
            'insumo_id'=>'29',
            'cantidad'=>'20',
            'tipo_preparacion'=>'49'
        ]);DetalleReceta::create([
            'receta_id'=>'2',
            'insumo_id'=>'13',
            'cantidad'=>'6',
            'tipo_preparacion'=>'17'
        ]);DetalleReceta::create([
            'receta_id'=>'2',
            'insumo_id'=>'25',
            'cantidad'=>'10',
            'tipo_preparacion'=>'37'
        ]);DetalleReceta::create([
            'receta_id'=>'2',
            'insumo_id'=>'1',
            'cantidad'=>'1',
            'tipo_preparacion'=>'1'
        ]);

        //receta 3
        DetalleReceta::create([
            'receta_id'=>'3',
            'insumo_id'=>'40',
            'cantidad'=>'150',
            'tipo_preparacion'=>'80'
        ]);DetalleReceta::create([
            'receta_id'=>'3',
            'insumo_id'=>'13',
            'cantidad'=>'3',
            'tipo_preparacion'=>'17'
        ]);DetalleReceta::create([
            'receta_id'=>'3',
            'insumo_id'=>'25',
            'cantidad'=>'10',
            'tipo_preparacion'=>'38'
        ]);

        //receta 4
        DetalleReceta::create([
            'receta_id'=>'4',
            'insumo_id'=>'40',
            'cantidad'=>'100',
            'tipo_preparacion'=>'78'
        ]); DetalleReceta::create([
            'receta_id'=>'4',
            'insumo_id'=>'37',
            'cantidad'=>'80',
            'tipo_preparacion'=>'66'
        ]);DetalleReceta::create([
            'receta_id'=>'4',
            'insumo_id'=>'29',
            'cantidad'=>'2',
            'tipo_preparacion'=>'49'
        ]); DetalleReceta::create([
            'receta_id'=>'4',
            'insumo_id'=>'5',
            'cantidad'=>'1',
            'tipo_preparacion'=>'5'
        ]); DetalleReceta::create([
            'receta_id'=>'4',
            'insumo_id'=>'13',
            'cantidad'=>'1',
            'tipo_preparacion'=>'18'
        ]); DetalleReceta::create([
            'receta_id'=>'4',
            'insumo_id'=>'23',
            'cantidad'=>'30',
            'tipo_preparacion'=>'34'
        ]);DetalleReceta::create([
            'receta_id'=>'4',
            'insumo_id'=>'4',
            'cantidad'=>'1',
            'tipo_preparacion'=>'4'
        ]);
    }
}

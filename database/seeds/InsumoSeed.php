<?php

use Illuminate\Database\Seeder;
use App\Models\Insumo;

class InsumoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {//calorias por cada 100g
        Insumo::create([
            'nombre'=>'Sal',
            'descripcion'=>'',
            'calorias'=>'0',
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Pimienta',
            'descripcion'=>'',
            'calorias'=>'251',
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Oregano',
            'descripcion'=>'',
            'calorias'=>'308',//308kcal
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Laurel',
            'descripcion'=>'',
            'calorias'=>'313',
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Albahaca',
            'descripcion'=>'',
            'calorias'=>'22',
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Romero',
            'descripcion'=>'',
            'calorias'=>'131',
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Vainilla',
            'descripcion'=>'',
            'calorias'=>'288',
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Canela molida',
            'descripcion'=>'',
            'calorias'=>'247',
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Zanahoria',
            'descripcion'=>'',
            'calorias'=>'41',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Rabano',
            'descripcion'=>'',
            'calorias'=>'16',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Nabo',
            'descripcion'=>'',
            'calorias'=>'28',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Cebolla',
            'descripcion'=>'',
            'calorias'=>'40',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Ajo',
            'descripcion'=>'',
            'calorias'=>'149',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Remolacha',
            'descripcion'=>'',
            'calorias'=>'43',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Aguacate',
            'descripcion'=>'',
            'calorias'=>'160',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Esparrago',
            'descripcion'=>'',
            'calorias'=>'20',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Puerro',
            'descripcion'=>'',
            'calorias'=>'61',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Cilantro',
            'descripcion'=>'',
            'calorias'=>'23',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Apio',
            'descripcion'=>'',
            'calorias'=>'16',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Espinaca',
            'descripcion'=>'',
            'calorias'=>'22',//22kcal
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Lechuga',
            'descripcion'=>'',
            'calorias'=>'15',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Coliflor',
            'descripcion'=>'',
            'calorias'=>'25',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Brocoli',
            'descripcion'=>'',
            'calorias'=>'34',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Alcachofa',
            'descripcion'=>'',
            'calorias'=>'47',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Pimiento Rojo',
            'descripcion'=>'',
            'calorias'=>'32.90',
            'categoria_id'=>'4',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Pimiento Verde',
            'descripcion'=>'',
            'calorias'=>'19.68',
            'categoria_id'=>'4',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Pimiento Amarillo',
            'descripcion'=>'',
            'calorias'=>'27',
            'categoria_id'=>'4',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Manzanas',
            'descripcion'=>'',
            'calorias'=>'52',
            'categoria_id'=>'4',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Aceite vegetal',
            'descripcion'=>'',
            'calorias'=>'884',
            'categoria_id'=>'5',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Arroz',
            'descripcion'=>'',
            'calorias'=>'130',
            'categoria_id'=>'3',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Habichuelas Negras',
            'descripcion'=>'',
            'calorias'=>'341',
            'categoria_id'=>'9',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Habichuelas Rojas',
            'descripcion'=>'',
            'calorias'=>'333',
            'categoria_id'=>'9',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Garbanzos',
            'descripcion'=>'',
            'calorias'=>'364',
            'categoria_id'=>'9',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Arvejas',
            'descripcion'=>'',
            'calorias'=>'81',
            'categoria_id'=>'9',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Habas',
            'descripcion'=>'',
            'calorias'=>'88',
            'categoria_id'=>'9',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Pollo',
            'descripcion'=>'',
            'calorias'=>'239',
            'categoria_id'=>'1',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Conejo',
            'descripcion'=>'',
            'calorias'=>'173',
            'categoria_id'=>'1',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Lomo de Cerdo',
            'descripcion'=>'',
            'calorias'=>'168',
            'categoria_id'=>'1',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Pavo',
            'descripcion'=>'',
            'calorias'=>'189',
            'categoria_id'=>'1',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Cordero',
            'descripcion'=>'',
            'calorias'=>'354',
            'categoria_id'=>'1',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Merluza',
            'descripcion'=>'',
            'calorias'=>'65',
            'categoria_id'=>'1',
            'unidad_id'=>'6',
        ]);

        Insumo::create([
            'nombre'=>'Pato',
            'descripcion'=>'',
            'calorias'=>'337',
            'categoria_id'=>'1',
            'unidad_id'=>'6',
        ]);
    }
}

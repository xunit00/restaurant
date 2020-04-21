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

        Insumo::create([//1
            'nombre'=>'Sal',
            'descripcion'=>'',
            'calorias'=>'0',
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//2
            'nombre'=>'Pimienta',
            'descripcion'=>'',
            'calorias'=>'251',
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//3
            'nombre'=>'Oregano',
            'descripcion'=>'',
            'calorias'=>'308',//308kcal
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//4
            'nombre'=>'Laurel',
            'descripcion'=>'',
            'calorias'=>'313',
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//5
            'nombre'=>'Albahaca',
            'descripcion'=>'',
            'calorias'=>'22',
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//6
            'nombre'=>'Romero',
            'descripcion'=>'',
            'calorias'=>'131',
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//7
            'nombre'=>'Vainilla',
            'descripcion'=>'',
            'calorias'=>'288',
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//8
            'nombre'=>'Canela molida',
            'descripcion'=>'',
            'calorias'=>'247',
            'categoria_id'=>'8',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//9
            'nombre'=>'Zanahoria',
            'descripcion'=>'',
            'calorias'=>'41',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//10
            'nombre'=>'Rabano',
            'descripcion'=>'',
            'calorias'=>'16',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//11
            'nombre'=>'Nabo',
            'descripcion'=>'',
            'calorias'=>'28',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//12
            'nombre'=>'Cebolla',
            'descripcion'=>'',
            'calorias'=>'40',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//13
            'nombre'=>'Ajo',
            'descripcion'=>'',
            'calorias'=>'149',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//14
            'nombre'=>'Remolacha',
            'descripcion'=>'',
            'calorias'=>'43',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//15
            'nombre'=>'Aguacate',
            'descripcion'=>'',
            'calorias'=>'160',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//16
            'nombre'=>'Esparrago',
            'descripcion'=>'',
            'calorias'=>'20',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//17
            'nombre'=>'Puerro',
            'descripcion'=>'',
            'calorias'=>'61',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//18
            'nombre'=>'Cilantro',
            'descripcion'=>'',
            'calorias'=>'23',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//19
            'nombre'=>'Apio',
            'descripcion'=>'',
            'calorias'=>'16',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//20
            'nombre'=>'Espinaca',
            'descripcion'=>'',
            'calorias'=>'22',//22kcal
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//21
            'nombre'=>'Lechuga',
            'descripcion'=>'',
            'calorias'=>'15',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//22
            'nombre'=>'Coliflor',
            'descripcion'=>'',
            'calorias'=>'25',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//23
            'nombre'=>'Brocoli',
            'descripcion'=>'',
            'calorias'=>'34',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//24
            'nombre'=>'Alcachofa',
            'descripcion'=>'',
            'calorias'=>'47',
            'categoria_id'=>'6',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//25
            'nombre'=>'Pimiento Rojo',
            'descripcion'=>'',
            'calorias'=>'32.90',
            'categoria_id'=>'4',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//26
            'nombre'=>'Pimiento Verde',
            'descripcion'=>'',
            'calorias'=>'19.68',
            'categoria_id'=>'4',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//27
            'nombre'=>'Pimiento Amarillo',
            'descripcion'=>'',
            'calorias'=>'27',
            'categoria_id'=>'4',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//28
            'nombre'=>'Manzanas',
            'descripcion'=>'',
            'calorias'=>'52',
            'categoria_id'=>'4',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//29
            'nombre'=>'Aceite vegetal',
            'descripcion'=>'',
            'calorias'=>'884',
            'categoria_id'=>'5',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//30
            'nombre'=>'Arroz',
            'descripcion'=>'',
            'calorias'=>'130',
            'categoria_id'=>'3',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//31
            'nombre'=>'Habichuelas Negras',
            'descripcion'=>'',
            'calorias'=>'341',
            'categoria_id'=>'9',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//32
            'nombre'=>'Habichuelas Rojas',
            'descripcion'=>'',
            'calorias'=>'333',
            'categoria_id'=>'9',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//33
            'nombre'=>'Garbanzos',
            'descripcion'=>'',
            'calorias'=>'364',
            'categoria_id'=>'9',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//34
            'nombre'=>'Arvejas',
            'descripcion'=>'',
            'calorias'=>'81',
            'categoria_id'=>'9',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//35
            'nombre'=>'Habas',
            'descripcion'=>'',
            'calorias'=>'88',
            'categoria_id'=>'9',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//36
            'nombre'=>'Pollo',
            'descripcion'=>'',
            'calorias'=>'239',
            'categoria_id'=>'1',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//37
            'nombre'=>'Conejo',
            'descripcion'=>'',
            'calorias'=>'173',
            'categoria_id'=>'1',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//38
            'nombre'=>'Lomo de Cerdo',
            'descripcion'=>'',
            'calorias'=>'168',
            'categoria_id'=>'1',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//39
            'nombre'=>'Pavo',
            'descripcion'=>'',
            'calorias'=>'189',
            'categoria_id'=>'1',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//40
            'nombre'=>'Cordero',
            'descripcion'=>'',
            'calorias'=>'354',
            'categoria_id'=>'1',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//41
            'nombre'=>'Merluza',
            'descripcion'=>'',
            'calorias'=>'65',
            'categoria_id'=>'1',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//42
            'nombre'=>'Pato',
            'descripcion'=>'',
            'calorias'=>'337',
            'categoria_id'=>'1',
            'unidad_id'=>'6',
        ]);

        Insumo::create([//43
            'nombre'=>'Huevo',
            'descripcion'=>'',
            'calorias'=>'155',
            'categoria_id'=>'7',
            'unidad_id'=>'6',
        ]);
    }
}

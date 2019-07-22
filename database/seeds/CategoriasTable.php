<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriasTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Categoria::create([
            'nombre'=>'Carne Roja',
            'descripcion'=>'carnes de color rojizo, proveniente de mamiferos o de caza'
        ]);

        //2
        Categoria::create([
            'nombre'=>'Carne Blanca',
            'descripcion'=>'carnes de color claro'
        ]);

        //3
        Categoria::create([
            'nombre'=>'Pescados y Mariscos',
            'descripcion'=>'productos del mar'
        ]);

        //4
        Categoria::create([
            'nombre'=>'Cereal',
            'descripcion'=>'plantas de grano'
        ]);

        //5
        Categoria::create([
            'nombre'=>'Especias',
            'descripcion'=>'plantas para dar sabor o cambiar su gusto'
        ]);

        //6
        Categoria::create([
            'nombre'=>'Lacteos',
            'descripcion'=>'productos derivados de la leche o lactosados'
        ]);

        //7
        Categoria::create([
            'nombre'=>'Leguminosas',
            'descripcion'=>'cemillas de vainas como los frijoles'
        ]);

        //8
        Categoria::create([
            'nombre'=>'Aceite Vegetal',
            'descripcion'=>'aceites extraidos de plantas como el aceite de oliva o soya'
        ]);

        //9
        Categoria::create([
            'nombre'=>'Verduras',
            'descripcion'=>''
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Producto;

class ProductosTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre_producto'=>'Arroz Blanco',
            'descripcion_producto'=>'',
            'id_categoria'=>4
        ]);
        Producto::create([
            'nombre_producto'=>'Carne de Pollo',
            'descripcion_producto'=>'',
            'id_categoria'=>''
        ]);
        Producto::create([
            'nombre_producto'=>'Carne de Res',
            'descripcion_producto'=>'',
            'id_categoria'=>1
        ]);
        Producto::create([
            'nombre_producto'=>'Carne de Chivo',
            'descripcion_producto'=>'',
            'id_categoria'=>1
        ]);
        Producto::create([
            'nombre_producto'=>'Carne de Cerdo',
            'descripcion_producto'=>'',
            'id_categoria'=>1
        ]);
        Producto::create([
            'nombre_producto'=>'Habichuelas Negras',
            'descripcion_producto'=>'',
            'id_categoria'=>7
        ]);
        Producto::create([
            'nombre_producto'=>'Habichuelas Rojas',
            'descripcion_producto'=>'',
            'id_categoria'=>7
        ]);
        Producto::create([
            'nombre_producto'=>'Gandules Rojos',
            'descripcion_producto'=>'',
            'id_categoria'=>7
        ]);
        Producto::create([
            'nombre_producto'=>'Gandules Negros',
            'descripcion_producto'=>'',
            'id_categoria'=>7
        ]);
        Producto::create([
            'nombre_producto'=>'Gandules Verdes',
            'descripcion_producto'=>'',
            'id_categoria'=>7
        ]);
        Producto::create([
            'nombre_producto'=>'Ajies Rojos',
            'descripcion_producto'=>'',
            'id_categoria'=>''
        ]);
        Producto::create([
            'nombre_producto'=>'Ajies Verdes',
            'descripcion_producto'=>'',
            'id_categoria'=>''
        ]);
        Producto::create([
            'nombre_producto'=>'Ajies Amarillos',
            'descripcion_producto'=>'',
            'id_categoria'=>''
        ]);
        Producto::create([
            'nombre_producto'=>'Cebolla Roja',
            'descripcion_producto'=>'',
            'id_categoria'=>''
        ]);
        Producto::create([
            'nombre_producto'=>'Cebolla Blanca',
            'descripcion_producto'=>'',
            'id_categoria'=>''
        ]);
        Producto::create([
            'nombre_producto'=>'Pimienta',
            'descripcion_producto'=>'',
            'id_categoria'=>5
        ]);
        Producto::create([
            'nombre_producto'=>'Sal Yodada',
            'descripcion_producto'=>'',
            'id_categoria'=>5
        ]);
        Producto::create([
            'nombre_producto'=>'Sal en Grano',
            'descripcion_producto'=>'',
            'id_categoria'=>5
        ]);
        Producto::create([
            'nombre_producto'=>'Sal en Grano',
            'descripcion_producto'=>'',
            'id_categoria'=>5
        ]);
    }
}

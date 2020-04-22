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
    }
}
// 'nombre', 'descripcion','categoria_id','precio','status'

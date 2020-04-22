<?php

use Illuminate\Database\Seeder;
use App\Models\Receta;

class RecetaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Receta::create([
            'producto_id' => '1',
            'descripcion' => 'receta de chofan variada',
            'porciones' => 1
        ]);

        Receta::create([
            'producto_id' => '2',
            'descripcion' => 'pollo frito con algo',
            'porciones' => 1
        ]);

        Receta::create([
            'producto_id' => '3',
            'descripcion' => 'chuletas picadas',
            'porciones' => 1
        ]);

        Receta::create([
            'producto_id' => '4',
            'descripcion' => 'estofado de bistec con vegetales',
            'porciones' => 1
        ]);
    }
}

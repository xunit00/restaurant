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

        // Receta::create([
        //     'producto_id' => '3',
        //     'descripcion' => 'pan tradicional',
        //     'porciones' => 1
        // ]);

        // Receta::create([
        //     'producto_id' => '4',
        //     'descripcion' => 'chiletas picadas',
        //     'porciones' => 1
        // ]);

        // Receta::create([
        //     'producto_id' => '5',
        //     'descripcion' => 'estofado de bistec',
        //     'porciones' => 1
        // ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'nombre'=>'Frente',
            'descripcion'=>'posicion frente a la entrada'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Mesa;

class MesasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mesa::create([
            'nombre'=>'F 1',
            'cubiertos'=>'4',
            'area_id'=>'1'
        ]);

        Mesa::create([
            'nombre'=>'F 2',
            'cubiertos'=>'4',
            'area_id'=>'1'
        ]);

        Mesa::create([
            'nombre'=>'F 3',
            'cubiertos'=>'4',
            'area_id'=>'1'
        ]);

        Mesa::create([
            'nombre'=>'F 4',
            'cubiertos'=>'4',
            'area_id'=>'1'
        ]);
    }
}

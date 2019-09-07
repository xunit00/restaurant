<?php

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Order Colocada',
            'percent' => 10,
        ]);
        Status::create([
            'name' => 'Preparando',
            'percent' => 30,
        ]);
        Status::create([
            'name' => 'Cocinando',
            'percent' => 50,
        ]);
        Status::create([
            'name' => 'Verificando Calidad',
            'percent' => 70,
        ]);
        Status::create([
            'name' => 'Listo para Enviar',
            'percent' => 100,
        ]);
    }
}

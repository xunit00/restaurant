<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gerente=User::create([
            'name'=>'gerente 1',
            'dni'=>'298-0987506-3',
            'telefono'=>'099-098-0987',
            'direccion'=>'casa',
            'email'=>'gerente1@test.com',
            'username'=>'gerente1',
            'password'=>bcrypt('12345678')
        ]);
        $gerente->assignRole('Gerente');

        $cliente=User::create([
            'name'=>'cliente generico',
            'dni'=>'000-0000000-0',
            'telefono'=>'000-000-0000',
            'direccion'=>'casa',
            'email'=>'cliente1@test.com',
            'username'=>'cliente',
            'password'=>bcrypt('12345678')
        ]);
        $cliente->assignRole('Cliente');

        $cajero=User::create([
            'name'=>'cajero 1',
            'dni'=>'198-0987506-3',
            'telefono'=>'099-098-0987',
            'direccion'=>'casa',
            'email'=>'cajero1@test.com',
            'username'=>'cajero1',
            'password'=>bcrypt('12345678')
        ]);
        $cajero->assignRole('Cajero');

        $mesero=User::create([
            'name'=>'mesero 1',
            'dni'=>'018-0987506-3',
            'telefono'=>'099-098-0987',
            'direccion'=>'casa',
            'email'=>'mesero1@test.com',
            'username'=>'mesero1',
            'password'=>bcrypt('12345678')
        ]);
        $mesero->assignRole('Mesero');

        $cocinero=User::create([
            'name'=>'cocinero 1',
            'dni'=>'098-2017506-3',
            'telefono'=>'099-098-0987',
            'direccion'=>'casa',
            'email'=>'cocinero1@test.com',
            'username'=>'cocinero1',
            'password'=>bcrypt('12345678')
        ]);
        $cocinero->assignRole('Cocinero');

        $admin=User::create([
            'name'=>'admin 1',
            'dni'=>'098-0053506-3',
            'telefono'=>'099-098-0987',
            'direccion'=>'casa',
            'email'=>'admin@test.com',
            'username'=>'admin',
            'password'=>bcrypt('12345678')
        ]);
        $admin->assignRole('Super-Admin');
    }
}

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
            'email'=>'gerente1@test.com',
            'username'=>'gerente1',
            'password'=>bcrypt('12345678')
        ]);
        $gerente->assignRole('Gerente');

        $cajero=User::create([
            'name'=>'cajero 1',
            'email'=>'cajero1@test.com',
            'username'=>'cajero1',
            'password'=>bcrypt('12345678')
        ]);
        $cajero->assignRole('Cajero');

        $mesero=User::create([
            'name'=>'mesero 1',
            'email'=>'mesero1@test.com',
            'username'=>'mesero1',
            'password'=>bcrypt('12345678')
        ]);
        $mesero->assignRole('Mesero');

        $cocinero=User::create([
            'name'=>'cocinero 1',
            'email'=>'cocinero1@test.com',
            'username'=>'cocinero1',
            'password'=>bcrypt('12345678')
        ]);
        $cocinero->assignRole('Cocinero');

        $admin=User::create([
            'name'=>'admin 1',
            'email'=>'admin@test.com',
            'username'=>'admin',
            'password'=>bcrypt('12345678')
        ]);
        $admin->assignRole('Super-Admin');
    }
}

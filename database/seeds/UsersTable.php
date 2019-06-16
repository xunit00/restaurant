<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usuario editor
        $editor=User::create([
            'name'=>'editor 1',
            'email'=>'editor_1@test.com',
            'username'=>'editor1',
            'password'=>bcrypt('12345678')
        ]);
        $editor->assignRole('editor');

        //usuario editor
        $moderador=User::create([
            'name'=>'moderador 1',
            'email'=>'moderador_1@test.com',
            'username'=>'moderador1',
            'password'=>bcrypt('12345678')
        ]);
        $moderador->assignRole('moderador');

        //usuario
        $admin=User::create([
            'name'=>'admin 1',
            'email'=>'admin@test.com',
            'username'=>'admin',
            'password'=>bcrypt('12345678')
        ]);
        $admin->assignRole('super-admin');
    }
}

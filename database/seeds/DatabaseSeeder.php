<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesandPermissions::class);
        $this->call(UsersTable::class);
        $this->call(StatusesTable::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // poner el nombre de la tabla en singular la cual se ejecutara con el comando de artisan
        $this->call(TagTableSeeder::class);
    }
}

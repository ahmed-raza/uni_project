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
      DB::table('users')->insert([
          'name'=>'Raza',
          'email'=>env('MY_EMAIL'),
          'password'=>bcrypt('password'),
          'role'=>'admin'
        ]);
    }
}

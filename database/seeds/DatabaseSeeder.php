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
          'name'=>env('MY_NAME'),
          'email'=>env('MY_EMAIL'),
          'password'=>bcrypt('password'),
          'role'=>'admin'
        ]);
      DB::table('categories')->insert([
          'name'=>'Electronics',
          'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
      DB::table('categories')->insert([
          'name'=>'Laptops',
          'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
      DB::table('categories')->insert([
          'name'=>'Mobile Phones',
          'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),

        ]);
      DB::table('categories')->insert([
          'name'=>'Books',
          'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
      DB::table('categories')->insert([
          'name'=>'Real Estate',
          'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}

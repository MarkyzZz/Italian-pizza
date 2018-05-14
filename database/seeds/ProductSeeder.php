<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Al Polo',
            'description' => str_random(10),
            'price' => 84,
            'image_path' => '/img/menu/al-pollo.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Al Tono',
            'description' => str_random(10),
            'price' => 90,
            'image_path' => '/img/menu/al tono.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Americana',
            'description' => str_random(10),
            'price' => 80,
            'image_path' => '/img/menu/americana.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Di Carne',
            'description' => str_random(10),
            'price' => 76,
            'image_path' => '/img/menu/di carne.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Italiana',
            'description' => str_random(10),
            'price' => 90,
            'image_path' => '/img/menu/italiana.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('products')->insert([
            'name' => 'Margherita',
            'description' => str_random(10),
            'price' => 77,
            'image_path' => '/img/menu/margherita.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('products')->insert([
            'name' => 'Marinara',
            'description' => str_random(10),
            'price' => 99,
            'image_path' => '/img/menu/marinara.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('products')->insert([
            'name' => 'Monte Verde',
            'description' => str_random(10),
            'price' => 76,
            'image_path' => '/img/menu/monte verde.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('products')->insert([
            'name' => 'Quatro Formaggi',
            'description' => str_random(10),
            'price' => 75,
            'image_path' => '/img/menu/quatro formaggi.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('products')->insert([
            'name' => 'Regina',
            'description' => str_random(10),
            'price' => 81,
            'image_path' => '/img/menu/regina.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('products')->insert([
            'name' => 'Salami',
            'description' => str_random(10),
            'price' => 89,
            'image_path' => '/img/menu/salami.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('products')->insert([
            'name' => 'Vegetariana',
            'description' => str_random(10),
            'price' => 84,
            'image_path' => '/img/menu/vegetariana.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}

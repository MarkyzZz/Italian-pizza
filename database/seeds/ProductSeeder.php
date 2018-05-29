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
            'description' => "This gud pizza!",
            'price' => 84,
            'image_path' => '/img/menu/al-pollo.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Al Tono',
            'description' => "This gud pizza too!",
            'price' => 90,
            'image_path' => '/img/menu/al tono.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Americana',
            'description' => "Me like this one!",
            'price' => 80,
            'image_path' => '/img/menu/americana.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Di Carne',
            'description' => "Very nice pizza!",
            'price' => 76,
            'image_path' => '/img/menu/di carne.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Italiana',
            'description' => "Very nice pizza!",
            'price' => 90,
            'image_path' => '/img/menu/italiana.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('products')->insert([
            'name' => 'Margherita',
            'description' => "Delicious and italian!",
            'price' => 77,
            'image_path' => '/img/menu/margherita.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('products')->insert([
            'name' => 'Marinara',
            'description' => "Delicious and italian!",
            'price' => 99,
            'image_path' => '/img/menu/marinara.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('products')->insert([
            'name' => 'Monte Verde',
            'description' => "Very gud pizza mate!",
            'price' => 76,
            'image_path' => '/img/menu/monte verde.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('products')->insert([
            'name' => 'Quatro Formaggi',
            'description' => "Very gud pizza mate!",
            'price' => 75,
            'image_path' => '/img/menu/quatro formaggi.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('products')->insert([
            'name' => 'Regina',
            'description' => "ME LIKE THIS IZZA!",
            'price' => 81,
            'image_path' => '/img/menu/regina.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('products')->insert([
            'name' => 'Salami',
            'description' => "ME LIKE THIS IZZA!",
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

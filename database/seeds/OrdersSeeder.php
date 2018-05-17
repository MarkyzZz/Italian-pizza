<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
	        'user_id' => 4,
	        'status' => 'open',
	        'amount' => 4,
	        'created_at' => Carbon::now(),
	        'updated_at' => Carbon::now()
        ]);
        DB::table('order_product')->insert([
	        'order_id' => 1,
	        'product_id' => 4,
	        'created_at' => Carbon::now(),
	        'updated_at' => Carbon::now()
        ]);
        DB::table('orders')->insert([
	        'user_id' => 4,
	        'status' => 'open',
	        'amount' => 2,
	        'created_at' => Carbon::now(),
	        'updated_at' => Carbon::now()
        ]);
        DB::table('order_product')->insert([
	        'order_id' => 1,
	        'product_id' => 4,
	        'created_at' => Carbon::now(),
	        'updated_at' => Carbon::now()
        ]);

        DB::table('orders')->insert([
	        'user_id' => 2,
	        'status' => 'closed',
	        'amount' => 2,
	        'created_at' => Carbon::now(),
	        'updated_at' => Carbon::now()
        ]);
        DB::table('order_product')->insert([
	        'order_id' => 2,
	        'product_id' => 3,
	        'created_at' => Carbon::now(),
	        'updated_at' => Carbon::now()
        ]);
    }
}

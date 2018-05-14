<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
	        'email' => 'admin@italian.pi',
	        'full_name' => 'Johny Conta',
	        'phone' => '069849825',
	        'city' => 'Bacioi',
	        'street' => '31 august 1989',
	        'block_number' => '8',
	        'apartment_number' => null,
	        'doorcode' => null,
	        'additional_info' => 'Me like pizza@!',
	        'password' => bcrypt('a123456'),
	        'created_at' => Carbon::now(),
	        'updated_at' => Carbon::now()
        ]);
    }
}

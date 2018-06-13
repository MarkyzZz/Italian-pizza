<?php

use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
	       'name' => 'Administrator',
           'created_at' => \Carbon\Carbon::now(),
           'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('roles')->insert([
	       'name' => 'Operator',
           'created_at' => \Carbon\Carbon::now(),
           'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('roles')->insert([
	       'name' => 'User',
           'created_at' => \Carbon\Carbon::now(),
           'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}

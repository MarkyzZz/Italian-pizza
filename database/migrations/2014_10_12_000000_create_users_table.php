<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->string('full_name');
            $table->char('phone', 12);
            $table->string('city');
            $table->string('street');
            $table->string('block_number');
            $table->string('apartment_number')->nullable();
            $table->string('doorcode')->nullable();
            $table->string('additional_info')->nullable();
            $table->integer('role_id')->unsigned()->default(3);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('users');
    }
}

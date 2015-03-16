<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('users', function($newTable){
                $newTable->increments('id');
                $newTable->string('email');
                $newTable->string('password');
                $newTable->string('reset_token')->nullable();
                $newTable->string('activation_token')->nullable();
                $newTable->integer('login_attampt')->nullable();
                $newTable->boolean('activation')->nullable();
                $newTable->text('to_do_list')->nullable();
                $newTable->string('href')->nullable();
                $newTable->timestamps();
                //$newTable->MEDIUMBLOB('image');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}

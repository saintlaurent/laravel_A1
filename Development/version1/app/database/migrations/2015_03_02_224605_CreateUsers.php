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
                $newTable->string('reset_token');
                $newTable->integer('login_attampt');
                $newTable->boolean('activation');
                $newTable->text('to_do_list');
                $newTable->string('href');
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user',function($table){
			$table->increments('id');					
			$table->String('email');
			$table->String('password');
			$table->string('name');
			$table->String('firstname');
			$table->String('tel');
			$table->String('adress');
			$table->String('city');
			$table->Date('birthdate');
			$table->String('gender');
			$table->integer('promo');
			$table->string('url_photo');
			$table->integer('isAdmin');
			$table->integer('isPres');	
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
		Schema::drop('user');
	}

}

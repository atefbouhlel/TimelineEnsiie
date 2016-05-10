<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publication',function($table){
			$table->increments('id');
			$table->string('url');	
			$table->integer('validation');
			$table->integer('type'); // 0:zip 1:photo 2:video
			$table->integer('rubric_id');
			$table->integer('user_id');
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
		Schema::drop('publication');
	}

}

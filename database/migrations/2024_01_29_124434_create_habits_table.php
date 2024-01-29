<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHabitsTable extends Migration {

	public function up()
	{
		Schema::create('habits', function(Blueprint $table) {
			$table->increments('id');
			$table->string('image');
			$table->string('name');
			$table->string('color');
			$table->string('icon');
			$table->integer('repetition');
			$table->json('days');
			$table->string('once_in');
			$table->integer('user_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('habits');
	}
}
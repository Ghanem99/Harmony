<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBreathTable extends Migration {

	public function up()
	{
		Schema::create('breath', function(Blueprint $table) {
			$table->increments('id');
			$table->string('video');
			$table->string('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('breath');
	}
}
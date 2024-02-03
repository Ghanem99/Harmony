<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiaryTable extends Migration {

	public function up()
	{
		Schema::create('diary', function(Blueprint $table) {
			$table->increments('id');
			$table->text('content');
			$table->integer('user_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('diary');
	}
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePodcastTable extends Migration {

	public function up()
	{
		Schema::create('podcast', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('link');
			$table->integer('category_id')->unsigned();
			$table->string('note');
		});
	}

	public function down()
	{
		Schema::drop('podcast');
	}
}
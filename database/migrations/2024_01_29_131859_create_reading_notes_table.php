<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReadingNotesTable extends Migration {

	public function up()
	{
		Schema::create('reading_notes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->text('content');
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('reading_notes');
	}
}
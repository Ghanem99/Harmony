<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration {

	public function up()
	{
		Schema::create('articles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('slug');
			$table->string('name');
			$table->string('description');
			$table->integer('category_id')->unsigned();
			$table->string('author');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('articles');
	}
}
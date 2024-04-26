<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryTable extends Migration {

	public function up()
	{
		Schema::create('category', function(Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('slug');
			$table->string('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('category');
	}
}
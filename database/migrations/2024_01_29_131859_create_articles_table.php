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
			$table->foreignId('category_id')->constrained()->cascadeOnDelete();
			$table->foreignId('author_id')->constrained('users');
			$table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('articles');
	}
}

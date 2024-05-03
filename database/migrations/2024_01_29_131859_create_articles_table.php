<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

	public function up()
	{
		Schema::create('articles', function(Blueprint $table) {
			$table->id();
			$table->string('slug');
			$table->string('name');
			$table->string('description');
			$table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
			$table->foreignId('author_id')->constrained('users');
			$table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('articles');
	}
};

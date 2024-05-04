<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

	public function up()
	{
		Schema::create('podcasts', function(Blueprint $table) {
			$table->id();
			$table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
			$table->string('title');
			$table->string('description');
			$table->string('file');
			$table->string('image');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('podcasts');
	}
};
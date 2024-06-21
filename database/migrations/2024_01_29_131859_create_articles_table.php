<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

	public function up()
	{
		Schema::create('articles', function(Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('content')->nullable();
			$table->string('image')->nullable();
			$table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
			$table->string('author')->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('articles');
	}
};

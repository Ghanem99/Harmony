<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('slug')->nullable();
			$table->string('description')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
};
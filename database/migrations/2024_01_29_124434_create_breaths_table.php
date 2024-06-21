<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

	public function up()
	{
		Schema::create('breaths', function(Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('duration')->nullable();
			$table->string('frequency')->nullable();
			$table->string('video')->nullable();
			$table->string('image')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('breath');
	}
};
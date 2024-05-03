<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

	public function up()
	{
		Schema::create('breath', function(Blueprint $table) {
			$table->increments('id');
			$table->string('video');
			$table->string('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('breath');
	}
};
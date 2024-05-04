<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

	public function up()
	{
		Schema::create('profile', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('address');
			$table->string('country');
			$table->timestamps();
			$table->date('date_of_birth');
		});
	}

	public function down()
	{
		Schema::drop('profile');
	}
};
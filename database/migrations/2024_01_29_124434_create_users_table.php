<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->id('id');
			$table->string('name');
			$table->string('email');
			$table->timestamp('email_verified_at')->nullable();
            $table->string('password');
			$table->string('age')->nullable();
			$table->string('gender')->nullable();
			$table->string('weight')->nullable();
			$table->string('mental_illness')->nullable();
			$table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->id('id');
			$table->string('name');
			$table->string('email');
			$table->timestamp('email_verified_at')->nullable();
            $table->string('password');
			$table->string('age')->nullable();
			$table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		x::drop('users');
	}
}

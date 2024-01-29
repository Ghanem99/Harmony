<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResponseSurveyTable extends Migration {

	public function up()
	{
		Schema::create('response_survey', function(Blueprint $table) {
			$table->increments('id');
			$table->string('question');
			$table->string('answer');
			$table->integer('user_id')->unsigned();
			$table->integer('survey_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('response_survey');
	}
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('articles', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('category')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('diary', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('profile', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('podcast', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('category')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('response_survey', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('response_survey', function(Blueprint $table) {
			$table->foreign('survey_id')->references('id')->on('survey')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('habits', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('reading_notes', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('articles', function(Blueprint $table) {
			$table->dropForeign('articles_category_id_foreign');
		});
		Schema::table('diary', function(Blueprint $table) {
			$table->dropForeign('diary_user_id_foreign');
		});
		Schema::table('profile', function(Blueprint $table) {
			$table->dropForeign('profile_user_id_foreign');
		});
		Schema::table('podcast', function(Blueprint $table) {
			$table->dropForeign('podcast_category_id_foreign');
		});
		Schema::table('response_survey', function(Blueprint $table) {
			$table->dropForeign('response_survey_user_id_foreign');
		});
		Schema::table('response_survey', function(Blueprint $table) {
			$table->dropForeign('response_survey_survey_id_foreign');
		});
		Schema::table('habits', function(Blueprint $table) {
			$table->dropForeign('habits_user_id_foreign');
		});
		Schema::table('reading_notes', function(Blueprint $table) {
			$table->dropForeign('reading_notes_user_id_foreign');
		});
	}
}
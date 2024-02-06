<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('habits', function(Blueprint $table) {
            $table->id();
			$table->integer('user_id')->constrained('users')
				->cascadeOnDelete();
			$table->string('title');
			$table->string('color');
			$table->string('icon');
			$table->integer('repetition');
			$table->string('days');
			$table->string('once_in');
			$table->string('reminder_at')->default('9:00pm');
			$table->string('image')->nullable();
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('life_styles');
    }
};

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
			$table->foreignId('user_id')->constrained('users')
				->cascadeOnDelete();
			$table->string('title');
			$table->string('color')->nullable();
			$table->string('icon')->nullable();
			$table->integer('repetition')->default(1);
			$table->string('days')->default('daily');
			$table->string('once_in')->nullable();
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

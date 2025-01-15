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
        Schema::create('training_slots', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->string('name');
            $table->time('start_time');
            $table->time('end_date');
            $table->double('available_seats');
            $table->foreignId('program_id')->constrained();
            $table->string('slug')->unique();
            $table->enum('status', [\App\Constant\ProgramEnrollmentStatus::AVAILABLE, \App\Constant\ProgramEnrollmentStatus::FULL, \App\Constant\ProgramEnrollmentStatus::ALMOST_FULL]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_slots');
    }
};

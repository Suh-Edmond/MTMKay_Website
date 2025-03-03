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
        Schema::create('program_outlines', function (Blueprint $table) {
            $table->id();
            $table->string('period');
            $table->text('topic');
            $table->foreignId('program_id')->constrained();
            $table->softDeletes();
            $table->timestamps();
            $table->string('slug')->unique();

         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_outlines');
    }
};

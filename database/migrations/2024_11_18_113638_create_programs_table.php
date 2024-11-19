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
        Schema::create('programs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->mediumText('objective');
            $table->mediumText('eligibility');
            $table->integer('duration')->default(1);
            $table->string('trainer_name');
            $table->integer('available_seats')->default(1);
            $table->string('image_path');
            $table->double('cost')->default(0);
            $table->mediumText('training_resources');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};

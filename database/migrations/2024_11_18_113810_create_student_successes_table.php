<?php

use App\Constant\BlogState;
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
        Schema::create('student_successes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('program_id');
            $table->uuid('user_id');
            $table->mediumText('message');
            $table->enum('status', [BlogState::PENDING, BlogState::APPROVED, BlogState::REJECTED])->default(BlogState::PENDING);
            $table->boolean('is_visible')->default(false);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('program_id')->references('id')->on('programs');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_successes');
    }
};

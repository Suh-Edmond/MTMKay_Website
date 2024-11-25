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
             $table->id();
            $table->foreignId('program_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->mediumText('message');
            $table->enum('status', [BlogState::PENDING, BlogState::APPROVED, BlogState::REJECTED])->default(BlogState::PENDING);
            $table->boolean('is_visible')->default(false);
            $table->softDeletes();
            $table->string('slug')->unique();
            $table->timestamps();


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

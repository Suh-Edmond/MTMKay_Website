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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->foreignId('user_id')->constrained();
            $table->enum('blog_state', [BlogState::PENDING, BlogState::APPROVED, BlogState::REJECTED])->default(BlogState::PENDING);
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
        Schema::dropIfExists('blogs');
    }
};

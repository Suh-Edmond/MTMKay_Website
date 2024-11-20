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
//        Schema::create('blog_categories', function (Blueprint $table) {
////            $table->integer('blog_id');
////            $table->integer('categories_id');
////            $table->timestamps();
////            $table->softDeletes();
////
////            $table->foreign('blog_id')->references('id')->on('blogs');
////            $table->foreign('categories_id')->references('id')->on('categories');
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::dropIfExists('blog_categories');
    }
};

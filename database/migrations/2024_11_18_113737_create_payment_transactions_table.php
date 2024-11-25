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
        Schema::create('payment_transactions', function (Blueprint $table) {
             $table->id();
            $table->foreignId('enrollment_id')->constrained();
            $table->double('amount_deposited');
            $table->dateTime('payment_date');
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
        Schema::dropIfExists('payment_transactions');
    }
};

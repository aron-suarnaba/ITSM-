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
        Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('status');


            $table->string('review_key')->nullable();
            $table->string('reviewed_by_id')->nullable();
            $table->dateTime('review_at')->nullable();
            $table->string('review_rejected_notes')->nullable();
            $table->uuid('approve_key')->nullable();

            $table->foreign('reviewed_by_id')->references('employee_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};

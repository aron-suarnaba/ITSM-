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
        Schema::create('approval', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('status');

            $table->string('review_key')->nullable();
            $table->string('ticket_number')->nullable();
            $table->string('approved_by_id')->nullable();

            $table->string('approval_rejected_notes')->nullable();
            $table->string('void_at')->nullable();

            $table->foreign('approved_by_id')->references('employee_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval');
    }
};

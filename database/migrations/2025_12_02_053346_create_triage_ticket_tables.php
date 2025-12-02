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
        Schema::create('triage_ticket_tables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('status');
            $table->string('ticket_number')->nullable();

            $table->string('checked_by_id')->nullable();
            $table->dateTime('checked_at')->nullable();
            $table->string('assigned_to_id')->nullable();
            $table->string('priority')->nullable();

            $table->foreign('checked_by_id')->references('employee_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('triage_ticket_tables');
    }
};

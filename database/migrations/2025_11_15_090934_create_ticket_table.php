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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Submission Phase
            // 1. Define string columns for user references
            $table->string('requested_by_id'); // Must match string employee_id
            $table->dateTime('requested_date');
            $table->date('needed_date');

            $table->string('requested_cat');
            $table->string('requested_details')->nullable();
            $table->string('request_type');

            // Review Phase
            $table->string('ticket_number')->nullable()->unique();
            $table->dateTime('datetime_received')->nullable();

            // 2. Define nullable string columns for user references
            $table->string('received_by_id')->nullable();
            $table->string('acknowledge_by_id')->nullable();

            $table->date('approximate_date')->nullable();
            $table->integer('estimate_days')->nullable();

            $table->string('assigned_to_id')->nullable();

            $table->dateTime('datetime_started')->nullable();
            $table->dateTime('datetime_finished')->nullable();
            $table->text('detailed_description')->nullable();
            $table->string('findings')->nullable();
            $table->text('action_taken')->nullable();

            // Approval Phase
            // 3. Define nullable string columns for user references
            $table->string('reviewed_by_id')->nullable();
            $table->string('approved_by_id')->nullable();
            $table->string('enduser_acceptance_id')->nullable();

            // ------------------------------------------
            // 🚨 FOREIGN KEY CONSTRAINTS 🚨
            // Must use explicit foreign()->references()->on() syntax for string primary keys
            // ------------------------------------------

            // requested_by_id (Cannot be null)
            $table->foreign('requested_by_id')->references('employee_id')->on('users');

            // Review Phase IDs (Can be null)
            $table->foreign('received_by_id')->references('employee_id')->on('users');
            $table->foreign('acknowledge_by_id')->references('employee_id')->on('users');
            $table->foreign('assigned_to_id')->references('employee_id')->on('users');

            // Approval Phase IDs (Can be null)
            $table->foreign('reviewed_by_id')->references('employee_id')->on('users');
            $table->foreign('approved_by_id')->references('employee_id')->on('users');
            $table->foreign('enduser_acceptance_id')->references('employee_id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

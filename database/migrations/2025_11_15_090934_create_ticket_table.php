<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**S
     * Run the migrations.
     */
    // 2025_11_15_090934_create_ticket_table.php

    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('status'); // Status is used throughout the lifecycle

            // ------------------------------------------
            // I. Submission Phase
            // ------------------------------------------
            $table->string('requested_by_id'); // Must match string employee_id
            $table->date('needed_date');

            $table->string('requested_cat');
            $table->string('requested_details')->nullable();
            $table->string('request_type');
            $table->text('detailed_description'); // Removed nullable and placed it here
            $table->uuid('review_key')->nullable();


            // ------------------------------------------
            // II. Review & Approval Phase
            // ------------------------------------------

            // 🚨 FIX 1: ADDED MISSING COLUMN 🚨
            $table->string('received_by_id')->nullable();

            $table->string('reviewed_by_id')->nullable();
            $table->dateTime('review_at')->nullable();
            $table->string('review_rejected_notes')->nullable();

            $table->string('approved_by_id')->nullable();
            // 🚨 FIX 2: REMOVED ->unique() 🚨
            $table->dateTime('approved_at')->nullable();
            $table->uuid('approve_key')->nullable();
            $table->string('approval_rejected_notes')->nullable();

            $table->string('ticket_number')->nullable();
            $table->string('acknowledge_by_id')->nullable();


            // ------------------------------------------
            // III. Assignment & Work Phase
            // ------------------------------------------
            $table->string('assigned_to_id')->nullable();
            $table->dateTime('datetime_received')->nullable();
            $table->dateTime('datetime_started')->nullable();
            $table->dateTime('datetime_finished')->nullable();
            $table->date('approximate_date')->nullable();
            $table->integer('estimated_days')->nullable();

            $table->text('findings')->nullable(); // Changed to text for potentially longer content
            $table->text('action_taken')->nullable(); // Changed to text for potentially longer content

            // ------------------------------------------
            // IV. End-User Acceptance Phase
            // ------------------------------------------
            $table->string('enduser_acceptance_id')->nullable();

            // ------------------------------------------
            // 🚨 FOREIGN KEY CONSTRAINTS 🚨 (All OK now that received_by_id is defined)
            // ------------------------------------------

            // requested_by_id (Cannot be null)
            $table->foreign('requested_by_id')->references('employee_id')->on('users');

            // Review Phase IDs (Can be null)
            $table->foreign('received_by_id')->references('employee_id')->on('users'); // Now works
            $table->foreign('acknowledge_by_id')->references('employee_id')->on('users');
            $table->foreign('assigned_to_id')->references('employee_id')->on('users');

            // Approval Phase IDs (Can be null)
            $table->foreign('reviewed_by_id')->references('employee_id')->on('users');
            $table->foreign('approved_by_id')->references('employee_id')->on('users');
            $table->foreign('enduser_acceptance_id')->references('employee_id')->on('users');

        });

        DB::statement('CREATE UNIQUE INDEX tickets_ticket_number_unique ON tickets (ticket_number) WHERE ticket_number IS NOT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

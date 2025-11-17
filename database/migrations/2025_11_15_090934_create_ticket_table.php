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
            $table->string('requester_id');
            $table->dateTime('date_req');
            $table->date('date_needed');
            $table->string('req_cat');
            $table->string('req_details')->nullable();
            $table->string('req_type');
            $table->string('classification');
            $table->string('ticket_number')->unique();
            $table->dateTime('received_at');
            $table->string('acknowledge_by_id');
            $table->date('approx_date_start');
            $table->integer('est_no_days');
            $table->string('assigned_to');
            $table->dateTime('date_start');
            $table->dateTime('date_finish');
            $table->string('detailed_desc');
            $table->string('findings');
            $table->string('action_taken');
            $table->string('reviewed_by_id');
            $table->string('approved_by_id');
            $table->string('end_users_acceptance_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};

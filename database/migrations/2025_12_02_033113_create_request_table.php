<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\RequestStatus;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('status', array_column(RequestStatus::cases(), 'value'))
                ->default(RequestStatus::FOR_REVIEW->value);

            $table->string('requested_by_id');
            $table->date('needed_date');

            $table->string('requested_cat');
            $table->string('requested_details')->nullable();
            $table->string('request_type');
            $table->text('detailed_description');
            $table->uuid('review_key')->nullable();

            $table->foreign('requested_by_id')->references('employee_id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};

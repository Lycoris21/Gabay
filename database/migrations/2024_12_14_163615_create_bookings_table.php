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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tutee_id');
            $table->unsignedBigInteger('tutor_id');
            $table->string('subject_name');
            $table->string('subject_topic');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('platform');
            $table->string('link');
            $table->string('status')->default('pending'); // Added status column
            $table->timestamps();

            // Foreign keys
            $table->foreign('tutee_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tutor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

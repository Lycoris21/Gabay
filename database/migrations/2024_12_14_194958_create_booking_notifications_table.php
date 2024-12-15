<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingNotificationsTable extends Migration
{
    public function up(): void
    {
        Schema::create('booking_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id');
            $table->string('action');
            $table->string('booking');
            $table->timestamp('time_created');
            $table->timestamps();

            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('booking_notifications', function (Blueprint $table) {
            $table->dropForeign(['sender_id']);
            $table->dropForeign(['receiver_id']);
        });

        Schema::dropIfExists('booking_notifications');
    }
}

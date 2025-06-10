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
        Schema::create('booking_guest_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_confirmation_id')->nullable();
            $table->foreign('booking_confirmation_id')->references('id')->on('booking_confirmations')->onDelete('cascade');
            $table->string('guest_first_name')->nullable();
            $table->string('guest_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout_guest_infos');
    }
};

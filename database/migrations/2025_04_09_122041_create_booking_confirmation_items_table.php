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
        Schema::create('booking_confirmation_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_confirmation_id');
            $table->unsignedBigInteger('product_varient_id');
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->bigInteger('verification_number');
            $table->enum('verification_status', ['pending', 'completed']);
            $table->tinyInteger('giftproduct')->default(1);
            $table->timestamps();

            $table->foreign('booking_confirmation_id')->references('id')->on('booking_confirmations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_confirmation_items');
        
    }
};

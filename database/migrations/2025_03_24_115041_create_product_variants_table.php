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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->longText('short_description')->nullable();
            $table->decimal('unit_price', 10, 2);
            $table->string('unit_type')->nullable();
            $table->decimal('discounted_price', 10, 2)->nullable();
            $table->integer('available_quantity')->default(0);
            $table->integer('threshold_quantity')->default(0);
            $table->date('validity_from')->nullable();
            $table->date('validity_to')->nullable();
            $table->boolean('timer_flag')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};

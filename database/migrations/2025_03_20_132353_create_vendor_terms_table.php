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
        Schema::create('vendor_terms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->nullable()->index();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('set null');
            $table->longText('terms')->nullable();
            $table->foreignId('product_id')->nullable()->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_terms');
    }
};

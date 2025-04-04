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
        Schema::create('nbv_terms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('terms')->nullable();
            $table->string('type')->nullable();
            $table->boolean('status')->default(1); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nbv_terms');
    }
};

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
        Schema::create('support_sections', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('label');
            $table->string('title');
            $table->string('button_text');
            $table->string('form_action')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_sections');
    }
};

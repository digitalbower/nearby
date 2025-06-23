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
       
        Schema::create('blogfooters', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['text', 'social']);
            $table->text('footer_text')->nullable();
            $table->string('footer_link')->nullable();
            $table->string('social_icon')->nullable();
            $table->string('social_link')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogfooters');
    }
};

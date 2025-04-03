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
        Schema::create('footers', function (Blueprint $table) {
            
            $table->id();
            $table->string('type')->nullable(); // Dropdown: Top Destination, Information, Follow Us
            $table->text('item_text')->nullable();
            $table->text('link')->nullable();
            $table->string('icon')->nullable(); // Now a string instead of JSON
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};

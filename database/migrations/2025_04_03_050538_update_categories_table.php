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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('categoryicon')->nullable(); // Add categoryicon column
            $table->tinyInteger('enable_homecarousel')->default(1); // Add enable_homecarousel column
            $table->dropColumn(['filter_link', 'show_on_home']); // Remove filter_link and show_on_home columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['categoryicon', 'enable_homecarousel']); // Remove added columns
            $table->string('filter_link')->nullable(); // Re-add removed column
            $table->boolean('show_on_home')->default(0); // Re-add removed column
        });
    }
};

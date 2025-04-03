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
        Schema::table('navigation_menus', function (Blueprint $table) {
            $table->dropColumn('label'); // Remove label column
            $table->string('link')->nullable()->after('icon'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('navigation_menus', function (Blueprint $table) {
            $table->dropColumn('link'); // Remove link column if rolled back
            $table->string('label')->nullable(); 
        });
    }
};

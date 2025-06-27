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
        Schema::table('product_variants', function (Blueprint $table) {
            $table->integer('holiday_length')->nullable();
            $table->date('bookable_start_date')->nullable();
            $table->date('bookable_end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropColumn('holiday_length');
            $table->dropColumn('bookable_start_date');
            $table->dropColumn('bookable_end_date');
        });
    }
};

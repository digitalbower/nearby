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
        Schema::table('booking_confirmation_items', function (Blueprint $table) {
            $table->date('check_in_date')->nullable()->after('quantity');
            $table->date('check_out_date')->nullable()->after('check_in_date');
            $table->boolean('dated_product')->default(0)->after('check_out_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_confirmation_items', function (Blueprint $table) {
            $table->dropColumn('check_in_date');
            $table->dropColumn('check_out_date');
            $table->dropColumn('dated_product');
        });
    }
};

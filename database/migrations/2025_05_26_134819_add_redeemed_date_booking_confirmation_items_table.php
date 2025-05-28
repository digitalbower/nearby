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
            $table->date('redeemed_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_confirmation_items', function (Blueprint $table) {
             $table->dropColumn('redeemed_date');
        });
    }
};

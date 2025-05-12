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
        Schema::table('booking_confirmations', function (Blueprint $table) {
            $table->string('promocode')->nullable()->after('vat');
            $table->decimal('promocode_discount_amount', 10, 2)->nullable()->after('promocode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_confirmations', function (Blueprint $table) {
            $table->dropColumn('promocode');
            $table->dropColumn('promocode_discount_amount');
        });
    }
};

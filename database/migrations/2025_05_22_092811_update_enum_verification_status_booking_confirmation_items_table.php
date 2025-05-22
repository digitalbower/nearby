<?php

use App\Enums\VerificationStatus;
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
            $table->dropColumn('verification_status');
        });
        Schema::table('booking_confirmation_items', function (Blueprint $table) {
            // Re-add it using the ENUM
            $table->enum('verification_status', array_column(VerificationStatus::cases(), 'value'))
                  ->default(VerificationStatus::Pending->value);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_confirmation_items', function (Blueprint $table) {
            $table->dropColumn('verification_status');
        });

        Schema::table('booking_confirmation_items', function (Blueprint $table) {
            // Revert to old ENUM (update with your actual old values)
            $table->enum('verification_status', ['pending', 'completed'])
                  ->default('pending');
        });
    }
};

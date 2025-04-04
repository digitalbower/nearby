<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add new columns only if they don't exist
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'dob')) {
                $table->date('dob')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('users', 'profileicon')) {
                $table->string('profileicon')->nullable()->after('dob');
            }
            if (!Schema::hasColumn('users', 'gender_id')) {
                $table->unsignedBigInteger('gender_id')->nullable()->after('profileicon');
            }
            if (!Schema::hasColumn('users', 'nationality_id')) {
                $table->unsignedBigInteger('nationality_id')->nullable()->after('gender_id');
            }
            if (!Schema::hasColumn('users', 'cor_id')) {
                $table->unsignedBigInteger('cor_id')->nullable()->after('nationality_id');
            }
            if (!Schema::hasColumn('users', 'address')) {
                $table->text('address')->nullable()->after('password');
            }
            if (!Schema::hasColumn('users', 'country_code_id')) {
                $table->unsignedBigInteger('country_code_id')->nullable()->after('address');
            }
        });

        // Add foreign key constraints if the respective columns now exist.
        Schema::table('users', function (Blueprint $table) {
            // Note: Dropping foreign keys is usually required in the down() method.
            if (Schema::hasColumn('users', 'gender_id')) {
                $table->foreign('gender_id')->references('id')->on('genders')->onDelete('set null');
            }
            if (Schema::hasColumn('users', 'nationality_id')) {
                $table->foreign('nationality_id')->references('id')->on('countries')->onDelete('set null');
            }
            if (Schema::hasColumn('users', 'cor_id')) {
                $table->foreign('cor_id')->references('id')->on('countries')->onDelete('set null');
            }
            if (Schema::hasColumn('users', 'country_code_id')) {
                $table->foreign('country_code_id')->references('id')->on('countries')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key constraints first (if they exist)
            if (Schema::hasColumn('users', 'gender_id')) {
                $table->dropForeign(['gender_id']);
            }
            if (Schema::hasColumn('users', 'nationality_id')) {
                $table->dropForeign(['nationality_id']);
            }
            if (Schema::hasColumn('users', 'cor_id')) {
                $table->dropForeign(['cor_id']);
            }
            if (Schema::hasColumn('users', 'country_code_id')) {
                $table->dropForeign(['country_code_id']);
            }

            // Then drop the columns if they exist.
            if (Schema::hasColumn('users', 'dob')) {
                $table->dropColumn('dob');
            }
            if (Schema::hasColumn('users', 'profileicon')) {
                $table->dropColumn('profileicon');
            }
            if (Schema::hasColumn('users', 'gender_id')) {
                $table->dropColumn('gender_id');
            }
            if (Schema::hasColumn('users', 'nationality_id')) {
                $table->dropColumn('nationality_id');
            }
            if (Schema::hasColumn('users', 'cor_id')) {
                $table->dropColumn('cor_id');
            }
            if (Schema::hasColumn('users', 'address')) {
                $table->dropColumn('address');
            }
            if (Schema::hasColumn('users', 'country_code_id')) {
                $table->dropColumn('country_code_id');
            }
        });
    }
};

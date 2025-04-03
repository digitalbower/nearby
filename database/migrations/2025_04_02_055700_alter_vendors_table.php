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
        Schema::table('vendors', function (Blueprint $table) {
           $table->dropColumn('contact_info');
           $table->string('email')->nullable()->after('name');
           $table->string('phone')->nullable()->after('email');
           $table->date('validityfrom')->nullable()->after('phone');
           $table->date('validityto')->nullable()->after('validityfrom');
           $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('contact_info')->nullable();
            $table->dropColumn('email');
            $table->dropColumn('phone');
            $table->dropColumn('validityfrom');
            $table->dropColumn('validityto');
        });
    }
};

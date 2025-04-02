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
            $table->dropColumn('unit_type');
            $table->unsignedBigInteger('unit_type_id')->after('id')->nullable();
            $table->foreign('unit_type_id')->references('id')->on('unit_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropForeign(['unit_type_id']);
            $table->dropColumn('unit_type_id');
            $table->string('unit_type')->nullable();
        });
    }
};

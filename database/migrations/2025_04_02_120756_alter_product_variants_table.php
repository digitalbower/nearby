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
            $table->string('short_legend')->nullable()->after('short_description');
            $table->string('short_info')->nullable()->after('short_legend');
            $table->unsignedBigInteger('product_type_id')->after('id')->nullable()->after('short_info');
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropColumn('short_legend');
            $table->dropColumn('short_info');
            $table->dropForeign('product_type_id');
            $table->dropColumn('product_type_id');
        });
    }
};

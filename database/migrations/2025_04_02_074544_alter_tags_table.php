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
        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('giftable_deals');
            $table->dropColumn('tag_name');
            $table->longText('tags')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->string('tag_name')->nullable();
            $table->boolean('giftable_deals')->default(0);
            $table->dropColumn('tags');
        });
    }
};

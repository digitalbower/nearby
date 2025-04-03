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
        Schema::table('vendor_terms', function (Blueprint $table) {
            $table->dropForeign(['product_id']); 
            $table->dropColumn('product_id');  
            $table->string('name')->nullable()->after('vendor_id');
            $table->boolean('status')->default(1)->after('terms'); 
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendor_terms', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('status'); 
            $table->foreignId('product_id')->nullable()->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }
};

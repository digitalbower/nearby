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
        Schema::table('products', function (Blueprint $table) {
                $table->dropForeign(['tag_id']); 
                $table->dropColumn('tag_id');  
                $table->unsignedBigInteger('nbv_terms_id')->after('id')->nullable();
                $table->foreign('nbv_terms_id')->references('id')->on('nbv_terms')->onDelete('cascade');
                $table->string('product_support_phone')->nullable();
                $table->string('product_support_email')->nullable();
                $table->json('tags_id')->nullable();
                $table->unsignedBigInteger('emirates_id')->after('id')->nullable();
                $table->foreign('emirates_id')->references('id')->on('emirates')->onDelete('cascade');
                $table->longText('productlocation_address')->nullable();
                $table->longText('productlocation_link')->nullable();
                $table->longText('importantinfo')->nullable();
                $table->date('validity_from')->nullable();
                $table->date('validity_to')->nullable();
                $table->boolean('giftable')->default(1); 
                $table->boolean('herocarousel')->default(1); 
                $table->boolean('trending')->default(1); 
                $table->boolean('categorycarousel')->default(1); 
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id')->after('id')->nullable();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->dropForeign(['nbv_terms_id']); 
            $table->dropColumn('nbv_terms_id');  
            $table->dropColumn('product_support_phone');  
            $table->dropColumn('product_support_email');  
            $table->dropColumn('tags_id');  
            $table->dropForeign(['emirates_id']); 
            $table->dropColumn('emirates_id');  
            $table->dropColumn('productlocation_address');  
            $table->dropColumn('productlocation_link');  
            $table->dropColumn('importantinfo');  
            $table->dropColumn('validity_from');  
            $table->dropColumn('validity_to');  
            $table->dropColumn('giftable');  
            $table->dropColumn('herocarousel');  
            $table->dropColumn('trending');  
            $table->dropColumn('categorycarousel');  
        });
    }
};

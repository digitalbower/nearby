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
         Schema::table('blog_details', function (Blueprint $table) {
            
            $table->dropForeign(['blog_id']);
            $table->dropColumn('blog_id');

           
            $table->foreignId('featured_item_id')->after('id')
                  ->constrained('featured_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('blog_details', function (Blueprint $table) {
            
            $table->dropForeign(['featured_item_id']);
            $table->dropColumn('featured_item_id');

          
            $table->foreignId('blog_id')->after('id')
                  ->constrained('blogs')->onDelete('cascade');
        });
    }
};

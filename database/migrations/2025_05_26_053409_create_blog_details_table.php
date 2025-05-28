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
        Schema::create('blog_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_id')->constrained('blogs')->onDelete('cascade');
            
            $table->string('title');
            $table->text('description')->nullable();
            
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            
            $table->json('images')->nullable(); // Multiple image paths
            $table->boolean('is_featured')->default(false);
            $table->date('validity_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_details');
    }
};

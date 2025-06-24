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
        Schema::create('blog_header_footers', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('main_title')->nullable();
            $table->text('description')->nullable();
            $table->string('main_image')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->boolean('button_hide')->default(false);
            $table->json('social_media_icons')->nullable(); // for footers
            $table->text('footer_text')->nullable();        // for footers
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_header_footers');
    }
};

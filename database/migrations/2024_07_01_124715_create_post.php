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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->integer('post_author');
            $table->string('post_title');
            $table->string('post_slug');
            $table->longText('post_content');
            $table->string('post_excerpt');
            $table->string('post_status');
            $table->string('post_link');
            $table->enum('post_protect', ['1','2']);
            $table->integer('post_category_id');
            $table->longText('thumbnail');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};

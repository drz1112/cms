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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('pages_author');
            $table->string('pages_title');
            $table->string('pages_slug');
            $table->longText('pages_content');
            $table->string('pages_excerpt');
            $table->string('pages_status');
            $table->string('pages_link');
            $table->enum('pages_protect', ['1','2']);
            $table->integer('pages_category_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};

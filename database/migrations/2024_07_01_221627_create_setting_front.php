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
        Schema::create('setting_front', function (Blueprint $table) {
            $table->id();
            $table->string('default_font');
            $table->string('heading_font');
            $table->string('nav_font');
            $table->string('background_color');
            $table->string('default_color');
            $table->string('heading_color');
            $table->string('main_color');
            $table->string('contrast_color');
            $table->string('nav_color');
            $table->string('nav_hover_color');
            $table->string('nav_dropdown_background_color');
            $table->string('nav_dropdown_color');
            $table->string('nav_dropdown_hover_color');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_front');
    }
};

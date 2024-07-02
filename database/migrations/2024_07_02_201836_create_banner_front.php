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
        Schema::create('banner_front', function (Blueprint $table) {
            $table->id();
            $table->string('text_1');
            $table->string('text_1_color',10);
            $table->string('text_2');
            $table->string('text_2_color',10);
            $table->string('text_3');
            $table->string('text_3_color',10);
            $table->string('link_video');
            $table->string('text_link_video');
            $table->string('text_link_video_color',10);
            $table->string('hubungi_kami');
            $table->string('hubungi_kami_text');
            $table->string('image_banner_1');
            $table->string('image_banner_2');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_front');
    }
};

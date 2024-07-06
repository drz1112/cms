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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title');
            $table->string('site_keyword');
            $table->string('site_description');
            $table->string('site_Image_favicon');
            $table->string('site_Image_login');
            $table->string('site_Image_footer');
            $table->string('site_Image_navbar');
            $table->string('site_Image_dashboard');
            $table->string('site_twitter');
            $table->string('site_facebook');
            $table->string('site_instagram');
            $table->string('site_youtube');
            $table->string('site_tiktok');
            $table->string('site_contact_email');
            $table->string('site_contact_wa');
            $table->string('site_contact_wa_content');
            $table->string('site_contact_tlp');
            $table->string('site_contact_address');
            $table->longText('site_maps');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};

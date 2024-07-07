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
        Schema::create('setting_layout', function (Blueprint $table) {
            $table->id();
            $table->enum('section_1_activation',['0','1']); //BOX MENU
            $table->enum('section_2_activation',['0','1']); //PROFIL
            $table->enum('section_3_activation',['0','1']); //CLIENT
            $table->enum('section_4_activation',['0','1']); //BERITA
            $table->enum('section_5_activation',['0','1']); //GALERI
            $table->enum('section_6_activation',['0','1']); //TEAM
            $table->enum('section_7_activation',['0','1']); //F.A.Q
            $table->enum('section_8_activation',['0','1']); //KONTAK
            
            $table->enum('banner_2_activation',['0','1']); //banner 2 gambar bawah
            $table->enum('link_footer_1_activation',['0','1']); //link footer 1
            $table->enum('link_footer_2_activation',['0','1']); //link footer 2

            $table->integer('section_4_setID'); //Section 4 ID

            $table->integer('link_footer_1_1'); //link footer 1
            $table->integer('link_footer_1_2'); //link footer 1
            $table->integer('link_footer_1_3'); //link footer 1
            $table->integer('link_footer_1_4'); //link footer 1
            
            $table->integer('link_footer_2_1'); //link footer 1
            $table->integer('link_footer_2_2'); //link footer 1
            $table->integer('link_footer_2_3'); //link footer 1
            $table->integer('link_footer_2_4'); //link footer 1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_layout');
    }
};

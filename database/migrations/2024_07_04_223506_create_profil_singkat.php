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
        Schema::create('profil_singkat', function (Blueprint $table) {
            $table->id();
            $table->string('profilsingkat_gambar');
            $table->string('profilsingkat_title');
            $table->string('profilsingkat_subtitle');
            $table->longText('profilsingkat_description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_singkat');
    }
};

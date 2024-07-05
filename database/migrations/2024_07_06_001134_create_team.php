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
        Schema::create('team', function (Blueprint $table) {
            $table->id();
            $table->string('team_Nama');
            $table->string('team_Foto');
            $table->string('team_Jabatan');
            $table->string('team_twitter_link');
            $table->string('team_facebook_link');
            $table->string('team_ig_link');
            $table->enum('team_status', ['0','1']);
            $table->timestamps();
            $table->softDeletes();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team');
    }
};

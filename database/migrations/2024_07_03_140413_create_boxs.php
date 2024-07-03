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
        Schema::create('boxs', function (Blueprint $table) {
            $table->id();
            $table->string('judul_box_1');
            $table->string('judul_box_2');
            $table->string('judul_box_3');
            $table->string('judul_box_4');
            $table->string('deskripsi_box_1');
            $table->string('deskripsi_box_2');
            $table->string('deskripsi_box_3');
            $table->string('deskripsi_box_4');
            $table->enum('status_box_1', ['0','1']);
            $table->enum('status_box_2', ['0','1']);
            $table->enum('status_box_3', ['0','1']);
            $table->enum('status_box_4', ['0','1']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boxs');
    }
};

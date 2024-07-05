<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('galeri')->truncate();
        DB::table('galeri')->insert([
            [
                'galeri_title' => 'Galeri 1',
                'galeri_deskripsi_singkat' => 'Contoh Deskripsi Singkat Galeri 1',
                'galeri_gambar' => 'img/galeri/test-gallery.jpg',
                'galeri_status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'galeri_title' => 'Galeri 2',
                'galeri_deskripsi_singkat' => 'Contoh Deskripsi Singkat Galeri 2',
                'galeri_gambar' => 'img/galeri/test-gallery2.jpg',
                'galeri_status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'galeri_title' => 'Galeri 3',
                'galeri_deskripsi_singkat' => 'Contoh Deskripsi Singkat Galeri 3',
                'galeri_gambar' => 'img/galeri/test-gallery3.jpg',
                'galeri_status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'galeri_title' => 'Galeri 4',
                'galeri_deskripsi_singkat' => 'Contoh Deskripsi Singkat Galeri 4',
                'galeri_gambar' => 'img/galeri/test-gallery4.jpg',
                'galeri_status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->truncate();
        DB::table('kategori')->insert([
            [
                'namaKate' => 'Tentang',
                'parentid' => '0',
                'slug' => 'tentang',
                'menustatus' => 1,
                'type' => 'page',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaKate' => 'KabarMu',
                'parentid' => '0',
                'slug' => 'kabarmu',
                'menustatus' => 1,
                'type' => 'page',
                'created_at' => date('Y-m-d H:i:s'),
            ],

            [
                'namaKate' => 'Berita',
                'parentid' => '2',
                'slug' => 'berita',
                'menustatus' => 1,
                'type' => 'article',
                'created_at' => date('Y-m-d H:i:s'),
            ],

            [
                'namaKate' => 'Profil',
                'parentid' => '1',
                'slug' => 'profil',
                'menustatus' => 1,
                'type' => 'page',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaKate' => 'Sejarah',
                'parentid' => '1',
                'slug' => 'sejarah',
                'menustatus' => 1,
                'type' => 'page',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaKate' => 'Struktur Organisasi',
                'parentid' => '1',
                'slug' => 'struktur-organisasi',
                'menustatus' => 1,
                'type' => 'page',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

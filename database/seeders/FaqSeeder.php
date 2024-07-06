<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faq')->truncate();
        DB::table('faq')->insert([
            [
                'faq_pertanyaan' => 'Bagaimana cara mendaftar sebagai anggota?',
                'faq_jawaban' => 'Silahkan datang dan mendaftar',
                'faq_status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'faq_pertanyaan' => 'Apakah tahapan setelah mendaftar menjadi anggota?',
                'faq_jawaban' => 'Admin akan menghubungi anda untuk konfirmasi terkait pendaftaran',
                'faq_status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}

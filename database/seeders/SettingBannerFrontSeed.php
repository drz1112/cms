<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingBannerFrontSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banner_front')->truncate();
        DB::table('banner_front')->insert([
            [
                'text_1' =>'S1',
                'text_1_color' =>'#FFFFFF',
                'text_2' =>'Teknologi Informasi',
                'text_2_color' =>'#085284',
                'text_3' =>'Universitas Muhammadiyah Klaten',
                'text_3_color' =>'#FFFFFF',
                'link_video' =>'https://www.youtube.com/watch?v=uZ29bL2Jt_c',
                'text_link_video' =>'UMKLA',
                'text_link_video_color' =>'#FFFFFF',
                'hubungi_kami' =>'6281392236479',
                'hubungi_kami_text' =>'Assalamualaikum Warahmatullahi Wabarakatuh, Admin Prodi TI',
                'image_banner_1' =>'img/banner-1800-720.webp',
                'image_banner_2' =>'img/banner-1800-720-(2).webp',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}

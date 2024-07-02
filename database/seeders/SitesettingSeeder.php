<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitesettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_settings')->truncate();
        DB::table('site_settings')->insert([
            [
                'site_title' => 'CMS TI UMKLA',
                'site_keyword' => 'CMS TI UMKLA',
                'site_description' => 'CMS TI UMKLA',
                'site_Image_favicon' => 'img/favicon.png',
                'site_Image_navbar' => 'img/Logo-MDMC-Putih.png',
                'site_Image_footer' => 'img/Logo-footer-default.png',
                'site_Image_login' => 'img/Logo-login-default.png',
                'site_Image_dashboard' => 'img/Logo-dashboard-default.webp',

                'site_twitter' => 'https://twitter.com/',
                'site_facebook' => 'https://www.facebook.com/',
                'site_instagram' => 'https://www.instagram.com/',
                'site_youtube' => 'https://www.youtube.com/',
                'site_tiktok' => 'https://www.tiktok.com/',
                
                'site_contact_email' => 'admin@umkla.ac.id',
                'site_contact_wa' => '081392236479',
                'site_contact_wa_content' => 'Assalamualaikum Warahmatullahi Wabarakatuh, Admin Prodi TI',
                'site_contact_tlp' => '(0272) 323120',
                'site_contact_address' => 'Jl. Jombor Indah, Gemolong, Buntalan, Kec. Klaten Tengah Kabupaten Klaten, Jawa Tengah 57419',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}

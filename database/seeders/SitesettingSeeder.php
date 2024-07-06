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
                'site_Image_favicon' => 'img/default-favicon.png',
                'site_Image_navbar' => 'img/default-logo-navbar.png',
                'site_Image_footer' => 'img/default-Logo-footer.png',
                'site_Image_login' => 'img/default-Logo-login.png',
                'site_Image_dashboard' => 'img/default-logo-sidebar.png',

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
                'site_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.6461392151846!2d110.6060397!3d-7.7210627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a443d00000001%3A0x70266e7cde80e332!2sUniversitas%20Muhammadiyah%20Klaten%20(UMKLA)!5e0!3m2!1sen!2sid!4v1720268903054!5m2!1sen!2sid',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}

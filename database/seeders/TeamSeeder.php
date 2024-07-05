<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('team')->truncate();
        DB::table('team')->insert([
            [
                'team_Nama' => 'CMS TI UMKLA Name',
                'team_Jabatan' => 'CMS TI UMKLA Deskripsi',
                'team_twitter_link' => 'https://ti.umkla.ac.id/',
                'team_facebook_link' => 'https://ti.umkla.ac.id/',
                'team_ig_link' => 'https://ti.umkla.ac.id/',
                'team_Foto' => 'img/team/test team 1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'team_Nama' => 'CMS TI UMKLA Name',
                'team_Jabatan' => 'CMS TI UMKLA Deskripsi',
                'team_twitter_link' => 'https://ti.umkla.ac.id/',
                'team_facebook_link' => 'https://ti.umkla.ac.id/',
                'team_ig_link' => 'https://ti.umkla.ac.id/',
                'team_Foto' => 'img/team/test team 2.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'team_Nama' => 'CMS TI UMKLA Name',
                'team_Jabatan' => 'CMS TI UMKLA Deskripsi',
                'team_twitter_link' => 'https://ti.umkla.ac.id/',
                'team_facebook_link' => 'https://ti.umkla.ac.id/',
                'team_ig_link' => 'https://ti.umkla.ac.id/',
                'team_Foto' => 'img/team/test team 3.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'team_Nama' => 'CMS TI UMKLA Name',
                'team_Jabatan' => 'CMS TI UMKLA Deskripsi',
                'team_twitter_link' => 'https://ti.umkla.ac.id/',
                'team_facebook_link' => 'https://ti.umkla.ac.id/',
                'team_ig_link' => 'https://ti.umkla.ac.id/',
                'team_Foto' => 'img/team/test team 4.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

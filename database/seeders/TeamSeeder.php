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
                'team_Nama' => 'Team 1',
                'team_Jabatan' => 'team 1 jabatan',
                'team_twitter_link' => 'https://x.com/',
                'team_facebook_link' => 'https://www.facebook.com/',
                'team_ig_link' => 'https://www.instagram.com/',
                'team_Foto' => 'img/team/team-1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'team_Nama' => 'Team 2',
                'team_Jabatan' => 'team 2 jabatan',
                'team_twitter_link' => 'https://x.com/',
                'team_facebook_link' => 'https://www.facebook.com/',
                'team_ig_link' => 'https://www.instagram.com/',
                'team_Foto' => 'img/team/team-2.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'team_Nama' => 'Team 3',
                'team_Jabatan' => 'team 3 jabatan',
                'team_twitter_link' => 'https://x.com/',
                'team_facebook_link' => 'https://www.facebook.com/',
                'team_ig_link' => 'https://www.instagram.com/',
                'team_Foto' => 'img/team/team-3.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
               'team_Nama' => 'Team 4',
                'team_Jabatan' => 'team 4 jabatan',
                'team_twitter_link' => 'https://x.com/',
                'team_facebook_link' => 'https://www.facebook.com/',
                'team_ig_link' => 'https://www.instagram.com/',
                'team_Foto' => 'img/team/team-4.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

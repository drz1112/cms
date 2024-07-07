<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingLayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting_layout')->truncate();
        DB::table('setting_layout')->insert([
            [
                'section_1_activation' => '1',
                'section_2_activation' => '1',
                'section_3_activation' => '1',
                'section_4_activation' => '1',
                'section_4_setID' => '1',

                'section_5_activation' => '1',
                'section_6_activation' => '1',
                'section_7_activation' => '1',
                'section_8_activation' => '1',
                'banner_2_activation' => '1',

                'link_footer_1_activation' => '1',
                'link_footer_2_activation' => '1',

                'link_footer_1_1' => '3',
                'link_footer_1_2' => '3',
                'link_footer_1_3' => '3',
                'link_footer_1_4' => '3',
                
                'link_footer_2_1' => '3',
                'link_footer_2_2' => '3',
                'link_footer_2_3' => '3',
                'link_footer_2_4' => '3',

                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}

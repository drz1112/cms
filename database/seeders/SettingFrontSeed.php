<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingFrontSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting_front')->truncate();
        DB::table('setting_front')->insert([
            [
                'default_font' => 'Roboto, system-ui, -apple-system, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, Liberation Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji',
              'heading_font' => 'Montserrat, sans-serif',
                'nav_font' => 'Open Sans, sans-serif',
                'background_color' => '#ffffff',
                'default_color' => '#444444',
                'heading_color' => '#222222',
                'main_color' => '#085284',
                'contrast_color' => '#ffffff',
                'nav_color' => '#222222',
                'nav_hover_color' => '#085284',
                'nav_dropdown_background_color' => '#ffffff',
                'nav_dropdown_color' => '#222222',
                'nav_dropdown_hover_color' => '#085284',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}

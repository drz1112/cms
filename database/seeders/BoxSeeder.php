<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('boxs')->truncate();
        DB::table('boxs')->insert([
            [
                'id'=> '1',
                'judul_box_1' => 'Box 1',
                'deskripsi_box_1'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet hendrerit ipsum. Nunc convallis mattis ligula sollicitudin sollicitudin.',
                'status_box_1' => '1',
                
                'judul_box_2' => 'Box 2',
                'deskripsi_box_2'=>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet hendrerit ipsum. Nunc convallis mattis ligula sollicitudin sollicitudin.',
                'status_box_2' => '1',

                'judul_box_3' => 'Box 3',
                'deskripsi_box_3'=>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet hendrerit ipsum. Nunc convallis mattis ligula sollicitudin sollicitudin.',
                'status_box_3' => '1',

                'judul_box_4' => 'Box 4',
                'deskripsi_box_4'=>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet hendrerit ipsum. Nunc convallis mattis ligula sollicitudin sollicitudin.',
                'status_box_4' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
        
    }
}

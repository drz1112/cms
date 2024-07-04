<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->truncate();
        DB::table('clients')->insert([
            [
                'clients_logos' => 'img/clients/default-client-1.png',
                'clients_name' => 'CMS TI UMKLA Name',
                'clients_description' => 'CMS TI UMKLA Deskripsi',
                'clients_link' => 'https://ti.umkla.ac.id/',
                'clients_status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}

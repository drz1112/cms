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
            ],
            [
                'clients_logos' => 'img/clients/client-1.png',
                'clients_name' => 'Client 1',
                'clients_description' => 'Deskripsi Client 1',
                'clients_link' => 'https://ti.umkla.ac.id/',
                'clients_status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'clients_logos' => 'img/clients/client-2.png',
                'clients_name' => 'Client 2',
                'clients_description' => 'Deskripsi Client 2',
                'clients_link' => 'https://ti.umkla.ac.id/',
                'clients_status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'clients_logos' => 'img/clients/client-3.png',
                'clients_name' => 'Client 3',
                'clients_description' => 'Deskripsi Client 3',
                'clients_link' => 'https://ti.umkla.ac.id/',
                'clients_status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'clients_logos' => 'img/clients/client-4.png',
                'clients_name' => 'Client 4',
                'clients_description' => 'Deskripsi Client 4',
                'clients_link' => 'https://ti.umkla.ac.id/',
                'clients_status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'clients_logos' => 'img/clients/client-5.png',
                'clients_name' => 'Client 5',
                'clients_description' => 'Deskripsi Client 5',
                'clients_link' => 'https://ti.umkla.ac.id/',
                'clients_status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}

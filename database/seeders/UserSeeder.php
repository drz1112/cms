<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'id'=> '111111',
            'name' => 'SuperAdmin MDMC',
            'email'=> 'superadmin_mdmc@gmail.com',
            'password'=> Hash::make('123'),
        ]);
        User::updateOrCreate([
            'id'=> '222222',
            'name' => 'Admin MDMC',
            'email'=> 'admin_mdmc@gmail.id',
            'password'=> Hash::make('123'),
        ]);
        User::updateOrCreate([
            'id'=> '333333',
            'name' => 'Anggota MDMC',
            'email'=> 'anggota_mdmc@gmail.id',
            'password'=> Hash::make('123'),
        ]);
    }
}

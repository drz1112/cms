<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(SitesettingSeeder::class);
        $this->call(SettingFrontSeed::class);
        $this->call(SettingBannerFrontSeed::class);
        $this->call(BoxSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(ProfilSingkatSeeder::class);
        $this->call(GaleriSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(TeamSeeder::class);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roleSuperAdmin = Role::updateOrCreate(['name' => 'SuperAdmin']);
        $roleAdmin = Role::updateOrCreate(['name' => 'Admin']);
        $roleAnggota = Role::updateOrCreate(['name' => 'Anggota']);

        $permission1 = Permission::updateOrCreate([
            'name' => 'alldashboard.access'
        ]);
        $permission2 = Permission::updateOrCreate([
            'name' => 'admindashboard.access'
        ]);
        $permission3 = Permission::updateOrCreate([
            'name' => 'anggota.access'
        ]);
        

        $roleSuperAdmin->givePermissionTo($permission1);
        $roleAdmin->givePermissionTo($permission2);
        $roleAnggota->givePermissionTo($permission3);

        $user1 = User::find(111111);
        $user2 = User::find(222222);
        $user3 = User::find(333333);
        $user1->assignRole(['SuperAdmin']);
        $user2->assignRole(['Admin']);
        $user3->assignRole(['Anggota']);
    }
}

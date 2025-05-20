<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Contracts\Permission;

class AssignPermissionToRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // role admin
        $admin = Role::where('name', 'admin')->first();
        $admin->givePermissionTo('view users');
        $admin->givePermissionTo('create users');
        $admin->givePermissionTo('edit users');
        $admin->givePermissionTo('remove users');
    }
}

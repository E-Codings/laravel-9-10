<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                Role::Name => "admin",
                Role::CREATED_AT => now(),
                Role::UPDATED_AT => now(),
            ],
            [
                Role::Name => "employee",
                Role::CREATED_AT => now(),
                Role::UPDATED_AT => now(),
            ]
        ];
        Role::insert($roles);
    }
}

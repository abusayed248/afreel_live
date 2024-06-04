<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrayOfRoleNames = [
            ['name' => 'admin'],
            ['name' => 'seller'],
            ['name' => 'buyer'],
        ];
        collect($arrayOfRoleNames)->map(function ($role) {
            return [
                'name' => $role['name'],
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->each(function ($role) {
            Role::query()->updateOrCreate([
                'name' => $role['name'],
                'guard_name' => 'web',
            ], $role);
        });

        // $role = Role::where(['name' => 'admin'])->first();
        // $role->givePermissionTo(Permission::all());
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $moderator = Role::create(['name' => 'moderator']);
        $user = Role::create(['name' => 'user']);

        $permissions = [
            'access_backend' => Permission::create(['name' => 'access backend']),
            'access_user_management' => Permission::create(['name' => 'access user management']),
        ];

        $admin->syncPermissions($permissions);
        $moderator->syncPermissions([$permissions['access_user_management']]);
    }
}

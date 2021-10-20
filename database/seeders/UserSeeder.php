<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'name' => 'root',
            'email' => 'root@root.de',
            'password' => password_hash('toor',1),
        ]);

        User::firstOrCreate([
            'name' => 'asd',
            'email' => 'asd@asd.de',
            'password' => password_hash('toor',1),
        ]);

        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'access backend']);
        $role->givePermissionTo($permission);
        $user->assignRole($role);

        $role = Role::create(['name' => 'test']);
        $role->givePermissionTo($permission);
        $user->assignRole($role);

       User::factory()->count(700)->create();
    }
}

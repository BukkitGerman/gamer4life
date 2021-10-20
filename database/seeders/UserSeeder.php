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


       User::factory()->count(700)->create();
    }
}

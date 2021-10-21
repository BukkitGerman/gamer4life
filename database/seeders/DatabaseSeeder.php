<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seedForLiveServer = $this->command->askWithCompletion('Seed for a live server?', ['yes', 'no'], 'no') === 'yes';
        if($seedForLiveServer){
            //SeedForLiveServer
        }

        $seeds = collect([
            UserSeeder::class,
            RoleSeeder::class,
        ]);




        $this->call($seeds->flatten()->toArray());

        $user = User::query()
            ->whereKey(1)
            ->first();
        $role = Role::query()
            ->where('name', 'admin')
            ->first();
        $user->assignRole($role);

        $this->command->info('Seeding successful.');
    }
}

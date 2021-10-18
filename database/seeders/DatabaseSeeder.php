<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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

        $seeds = collect([
            UserSeeder::class,
        ]);


        $this->call($seeds->flatten()->toArray());
        $this->command->info('Seeding successful.');
    }
}

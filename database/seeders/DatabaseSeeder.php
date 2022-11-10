<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call([UserSeeder::class]);
        $this->command->info('User table seeded!');

        $this->call([ClinicSeeder::class]);
        $this->command->info('User table seeded!');

        $this->call([ServiceSeeder::class]);
        $this->command->info('User table seeded!');


        $this->call([SpecialtySeeder::class]);
        $this->command->info('User table seeded!');

        $this->call([StatusSeeder::class]);
        $this->command->info('User table seeded!');
    }
}

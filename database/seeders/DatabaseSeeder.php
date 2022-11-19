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
        \App\Models\User::factory()->create([
            'name' => 'ramy.nagy',
            'email' => 'ramy.nagy@ramydemos.com',
        ]);
        $this->command->info(" ---------- Create admin ramy.nagy ---------- ");
        \App\Models\User::factory()->create([
            'name' => 'test.user',
            'email' => 'test.user@ramydemos.com',
        ]);
        $this->command->info(" ---------- Create test-user test.user ---------- ");

        $this->call([
            MovieSeeder::class
        ]);
        $this->command->info(" ---------- Movies sedded success  ---------- ");

    }
}

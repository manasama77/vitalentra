<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user without factory to avoid Faker issues
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@vitalentra.com',
            'email_verified_at' => now(),
            'password' => Hash::make('TSFjnD2nXqyzWIOy'),
        ]);

        // Seed carousel and news data
        $this->call([
            CarouselSeeder::class,
            NewsSeeder::class,
        ]);
    }
}

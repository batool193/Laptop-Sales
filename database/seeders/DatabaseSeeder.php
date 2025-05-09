<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'Admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin@12345678'),
        ]);
    }
}

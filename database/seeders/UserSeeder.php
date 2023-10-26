<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a sample admin user
        User::create([
            'name' => 'Muhammad Zabbar Falihin',
            'nip' => '222112225',
            'email' => 'admin1@example.com',
            'email_verified_at' => now(),
            'phone_number' => '081234567890',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        User::factory(100)->create();
    }
}

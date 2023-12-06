<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a sample admin user
        // User::create([
        //     'name' => 'Muhammad Zabbar Falihin',
        //     'nip' => '222112225',
        //     'email' => 'admin1@example.com',
        //     'email_verified_at' => now(),
        //     'phone_number' => '081234567890',
        //     'address' => 'Jln. Sensus 3',
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ]);

        // User::create([
        //     'name' => 'Gholidho Herda Prilasakly',
        //     'nip' => '222112074',
        //     'email' => 'admin2@example.com',
        //     'email_verified_at' => now(),
        //     'phone_number' => '085785529623',
        //     'address' => 'Gg H Dawel',
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ]);

        // User::factory(20)->create();

        User::truncate();

        // Path to the SQL file
        $sqlFile = base_path('database/seeders/data/sql/users.sql');

        // Check if the file exists
        if (file_exists($sqlFile)) {
            // Execute the SQL commands
            DB::unprepared(file_get_contents($sqlFile));
        } else {
            // Log or handle the error appropriately
            echo "SQL file not found: {$sqlFile}\n";
        }
    }
}

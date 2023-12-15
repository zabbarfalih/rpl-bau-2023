<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCSVSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the table
        User::truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Open the CSV file
        $csvFile = fopen(base_path('database/seeders/data/csv/data.csv'), 'r');

        // Skip the header row
        fgetcsv($csvFile);

        // Iterate over each row of the file
        while (($row = fgetcsv($csvFile)) !== FALSE) {
            // Insert data into the database
            User::insert([
                'id' => $row[0],
                'name' => $row[1],
                'nip' => $row[2],
                'email' => $row[3],
                'phone_number' => $row[4],
                'address' => $row[5],
                'picture' => $row[6],
                'password' => bcrypt($row[7]),
            ]);
        }

        // Close the file
        fclose($csvFile);
    }
}

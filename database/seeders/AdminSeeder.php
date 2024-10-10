<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Check if the admin user already exists to avoid duplicate entries
         if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@example.com',
                'role_id' => 1, // Assuming role_id 1 is for admin
                'status' => 1,  // Active
                'password' => Hash::make('123'), // Admin password (You can change this)
            ]);
        }
    }
}

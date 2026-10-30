<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            [
                'name' => 'Registry Administrator',
                'email' => 'admin@mubs.ac.ug',
                'role' => 'admin',
            ],
            [
                'name' => 'Sample Lecturer',
                'email' => 'lecturer@mubs.ac.ug',
                'role' => 'lecturer',
            ],
            [
                'name' => 'Sample Student',
                'email' => 'student@mubs.ac.ug',
                'role' => 'student',
            ],
        ];

        foreach ($accounts as $account) {
            User::updateOrCreate(
                ['email' => $account['email']],
                [
                    ...$account,
                    'password' => 'password',
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}

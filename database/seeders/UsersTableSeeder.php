<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'pfno' => 'user',
            'name' => 'Test User',
            'designation' => 'JAA',
            'email' => 'user@rjt.com',
            'mobile_no' => '1234567890',
            'role' => 'user',
            'is_active' => true,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),  // Make sure to hash the password
            'created_by' => 'System',
            'updated_by' => 'System',
        ]);

        User::create([
            'pfno' => 'clerk',
            'name' => 'Lekhraj Pabri',
            'designation' => 'JAA',
            'email' => 'clerk@rjt.com',
            'mobile_no' => '0987654321',
            'role' => 'dealing_clerk',
            'is_active' => true,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_by' => 'System',
            'updated_by' => 'System',
        ]);

        User::create([
            'pfno' => 'officer',
            'name' => 'Vasantlal Parmar',
            'designation' => 'ADFM-II',
            'email' => 'officer@rjt.com',
            'mobile_no' => '0987654321',
            'role' => 'approving_officer',
            'is_active' => true,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_by' => 'System',
            'updated_by' => 'System',
        ]);
    }
}

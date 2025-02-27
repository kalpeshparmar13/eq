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
            'pfno' => '50820231994',
            'name' => 'Vasant Parmar',
            'name_hindi' => "वसंत परमार",
            'designation' => 'ADFM-II',
            'designation_hindi' => "सहा. मंडल वित्त प्रबंधक",
            'email' => "adfm2@rjt.com",
            'mobile_no' => "9724040286",
            'rly_phone_no' => "",
            'station' => "Rajkot",
            'station_hindi' => "राजकोट",
            'office_name' => "Sr. Divisional Finance Manager's Office",
            'address_line1' => "Kothi Compound",
            'address_line2' => "Nr. Hospital Chowk",
            'city' => "Rajkot",
            'pincode' => "360001",
            'state' => "Gujarat",
            'file_name' => "No.RJT/ACCT/EQ",
            'diary_name' => "ADFM-II",
            'role' => 'approving_officer',
            'is_active' => true,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_by' => 'System',
            'updated_by' => 'System',
        ]);
    }
}

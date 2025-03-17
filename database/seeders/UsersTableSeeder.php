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
        $heading = true;
        $input_file = fopen(base_path("database/data/users.csv"), "r");

        $users = collect();

        while (($record = fgetcsv($input_file, 1000, ",")) !== FALSE)
        {
            if (!$heading)
            {
                $users->push([
                    "id" => $record['0'],
                    'pfno' => $record['1'],
                    'name' => $record['2'],
                    'name_hindi' => $record['3'],
                    'designation' => $record['4'],
                    'designation_hindi' => $record['5'],
                    'email' => $record['6'],
                    'mobile_no' => $record['7'],
                    'rly_phone_no' => $record['8'],
                    'station' => $record['9'],
                    'station_hindi' => $record['10'],
                    'office_name' => $record['11'],
                    'address_line1' => $record['12'],
                    'address_line2' => $record['13'],
                    'city' => $record['14'],
                    'pincode' => $record['15'],
                    'state' => $record['16'],
                    'file_name' => $record['17'],
                    'diary_name' => $record['18'],
                    'role' => $record['19'],
                    'is_active' => $record['20'],
                    'email_verified_at' => now(),
                    'password' => Hash::make($record['22']),
                    'created_by' => 'System',
                    'updated_by' => 'System',
                ]);
            }
            $heading = false;
        }
        fclose($input_file);

        $users->chunk(1000)->each(function ($chunk) {
            User::insert($chunk->toArray());
        });

        // User::create([
        //     'pfno' => 'user',
        //     'name' => 'Test User',
        //     'designation' => 'JAA',
        //     'email' => 'user@rjt.com',
        //     'mobile_no' => '1234567890',
        //     'role' => 'user',
        //     'is_active' => true,
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),  // Make sure to hash the password
        //     'created_by' => 'System',
        //     'updated_by' => 'System',
        // ]);

        // User::create([
        //     'pfno' => 'clerk',
        //     'name' => 'clerk',
        //     'designation' => 'JAA',
        //     'email' => 'clerk@rjt.com',
        //     'mobile_no' => '0987654321',
        //     'role' => 'dealing_clerk',
        //     'is_active' => true,
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'created_by' => 'System',
        //     'updated_by' => 'System',
        // ]);

        // User::create([
        //     'pfno' => '50829802940',
        //     'name' => 'ARYA KIRNENDU',
        //     'name_hindi' => "आर्या किरनेंदु",
        //     'designation' => 'SR. DFM',
        //     'designation_hindi' => "मंडल वित्त प्रबंधक",
        //     'email' => "srdfm@rjt.com",
        //     'mobile_no' => "9724094100",
        //     'rly_phone_no' => "",
        //     'station' => "Rajkot",
        //     'station_hindi' => "राजकोट",
        //     'office_name' => "Sr. Divisional Finance Manager's Office",
        //     'address_line1' => "Kothi Compound",
        //     'address_line2' => "Nr. Hospital Chowk",
        //     'city' => "Rajkot",
        //     'pincode' => "360001",
        //     'state' => "Gujarat",
        //     'file_name' => "No.RJT/ACCT/EQ",
        //     'diary_name' => "SRDFM",
        //     'role' => 'approving_officer',
        //     'is_active' => true,
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'created_by' => 'System',
        //     'updated_by' => 'System',
        // ]);

        // User::create([
        //     'pfno' => '50816241460',
        //     'name' => 'BIRDICHAND GHANCHA',
        //     'name_hindi' => "बिरदीचंद घांचा",
        //     'designation' => 'ADFM-I',
        //     'designation_hindi' => "सहा. मंडल वित्त प्रबंधक",
        //     'email' => "adfm1@rjt.com",
        //     'mobile_no' => "9724094102",
        //     'rly_phone_no' => "",
        //     'station' => "Rajkot",
        //     'station_hindi' => "राजकोट",
        //     'office_name' => "Sr. Divisional Finance Manager's Office",
        //     'address_line1' => "Kothi Compound",
        //     'address_line2' => "Nr. Hospital Chowk",
        //     'city' => "Rajkot",
        //     'pincode' => "360001",
        //     'state' => "Gujarat",
        //     'file_name' => "No.RJT/ACCT/EQ",
        //     'diary_name' => "ADFM-I",
        //     'role' => 'approving_officer',
        //     'is_active' => true,
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'created_by' => 'System',
        //     'updated_by' => 'System',
        // ]);

        // User::create([
        //     'pfno' => 'officer',
        //     'name' => 'Vasant Parmar',
        //     'name_hindi' => "वसंत परमार",
        //     'designation' => 'ADFM-II',
        //     'designation_hindi' => "सहा. मंडल वित्त प्रबंधक",
        //     'email' => "adfm2@rjt.com",
        //     'mobile_no' => "9724040286",
        //     'rly_phone_no' => "",
        //     'station' => "Rajkot",
        //     'station_hindi' => "राजकोट",
        //     'office_name' => "Sr. Divisional Finance Manager's Office",
        //     'address_line1' => "Kothi Compound",
        //     'address_line2' => "Nr. Hospital Chowk",
        //     'city' => "Rajkot",
        //     'pincode' => "360001",
        //     'state' => "Gujarat",
        //     'file_name' => "No.RJT/ACCT/EQ",
        //     'diary_name' => "ADFM-II",
        //     'role' => 'approving_officer',
        //     'is_active' => true,
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'created_by' => 'System',
        //     'updated_by' => 'System',
        // ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Station::truncate();
        $heading = true;
        $input_file = fopen(base_path("database/data/stations.csv"), "r");
        while (($record = fgetcsv($input_file, 1000, ",")) !== FALSE)
        {
            if (!$heading)
            {
                $station = array(
                    "id" => $record['0'],
                    "name" => $record['1'],
                    "code" => $record['2'],
                    "category" => $record['3'],
                    "division" => $record['4'],
                    "zone" => $record['5'],
                    "district" => $record['6'],
                    "state" => $record['7']
                );
                Station::create($station);    
            }
            $heading = false;
        }
        fclose($input_file);
    }
}

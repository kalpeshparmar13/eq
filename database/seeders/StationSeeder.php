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
        //Station::truncate();
        $heading = true;
        $input_file = fopen(base_path("database/data/stations.csv"), "r");

        $stations = collect();

        while (($record = fgetcsv($input_file, 1000, ",")) !== FALSE)
        {
            if (!$heading)
            {
                $stations->push([
                    "id" => $record['0'],
                    "name" => $record['1'],
                    "code" => $record['2'],
                    "category" => $record['3'],
                    "division" => $record['4'],
                    "zone" => $record['5'],
                    "district" => $record['6'],
                    "state" => $record['7']
                ]);
            }
            $heading = false;
        }
        fclose($input_file);

        $stations->chunk(1000)->each(function ($chunk) {
            Station::insert($chunk->toArray());
        });
    }
}

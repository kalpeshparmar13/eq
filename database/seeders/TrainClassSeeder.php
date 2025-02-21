<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrainClass;

class TrainClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TrainClass::insert([
            ['fname' => 'Anubhuti Class (EA)', 'sname' => 'EA'],
            ['fname' => 'AC First Class (1A)', 'sname' => '1A'],
            ['fname' => 'Vistadome AC (EV)', 'sname' => 'EV'],
            ['fname' => 'Exec. Chair Car (EC)', 'sname' => 'EC'],
            ['fname' => 'AC 2 Tier (2A)', 'sname' => '2A'],
            ['fname' => 'First Class (FC)', 'sname' => 'FC'],
            ['fname' => 'AC 3 Tier (3A)', 'sname' => '3A'],
            ['fname' => 'AC 3 Economy (3E)', 'sname' => '3E'],
            ['fname' => 'Vistadome Chair Car (VC)', 'sname' => 'VC'],
            ['fname' => 'AC Chair car (CC)', 'sname' => 'CC'],
            ['fname' => 'Sleeper (SL)', 'sname' => 'SL'],
            ['fname' => 'Vistadome Non AC (VS)', 'sname' => 'VS'],
            ['fname' => 'Second Sitting (2S)', 'sname' => '2S']
        ]);
    }
}

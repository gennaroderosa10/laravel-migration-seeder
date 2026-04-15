<?php

namespace Database\Seeders;

use App\Models\Train;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class TrainSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $stations = [
            'Milano Centrale',
            'Roma Termini',
            'Napoli Centrale',
            'Torino Porta Nuova',
            'Venezia Santa Lucia',
            'Bologna Centrale',
            'Firenze Santa Maria Novella',
            'Bari Centrale',
        ];

        $companies = ['Trenitalia', 'Italo', 'Trenord'];

        for ($i = 0; $i < 20; $i++) {

            $departureStation = $faker->randomElement($stations);
            $arrivalStation   = $faker->randomElement(
                array_filter($stations, fn($s) => $s !== $departureStation)
            );

            $departureTime = $faker->time('H:i:s');
            $arrivalTime   = date('H:i:s', strtotime($departureTime) + $faker->numberBetween(3600, 18000));

            $newTrain = new Train();
            $newTrain->company           = $faker->randomElement($companies);
            $newTrain->departure_station = $departureStation;
            $newTrain->arrival_station   = $arrivalStation;
            $newTrain->departure_time    = $departureTime;
            $newTrain->arrival_time      = $arrivalTime;
            $newTrain->departure_date    = $faker->dateTimeBetween('today', '+30 days')->format('Y-m-d');
            $newTrain->train_code        = strtoupper($faker->bothify('??####'));
            $newTrain->total_carriages   = $faker->numberBetween(4, 16);
            $newTrain->on_time           = $faker->boolean(80);  // 80% in orario
            $newTrain->cancelled         = $faker->boolean(5);   // 5% cancellati
            $newTrain->save();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TrainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $train = new Train();

        $train->company = "Trenitalia";
        $train->departure_station = "Milano";
        $train->arrival_station = "Roma";
        $train->date= $faker->date('Y-m-d');
        $train->departure_time = $faker->time('H:i:s');
        $train->arrival_time = $faker->time('H:i:s');
        $train->train_code = "R5648";
        $train->number_carriages = "3";

        // save train
        $train->save();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Provider\it_IT;
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
        for ($i = 0; $i < 10; $i++) {

            $train = new Train();

            $train->company = "Trenitalia";
            $train->departure_station = $faker->city();
            $train->arrival_station = $faker->city();
            $train->date= $faker->date('Y-m-d');
            $train->departure_time = $faker->time('H:i:s');
            $train->arrival_time = $faker->time('H:i:s');
            $train->train_code = $faker->regexify('[A-Z]{2}[0-9]{6}');
            $train->number_carriages = $faker->numberBetween(0, 8);
            $train->slug= $train->train_code .'-'. $train->departure_station .'-'. $train->arrival_station;

            // save train
            $train->save();
        }
    }
}

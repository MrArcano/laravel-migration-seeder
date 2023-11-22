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


        for ($i = 0; $i < 10; $i++) {

            $train = new Train();

            $train->company = "Trenitalia";
            // $train->departure_station = 'roma';
            // $train->arrival_station = 'milano';
            // $train->train_code = 'R54684';
            $train->departure_station = $faker->city();
            $train->arrival_station = $faker->city();
            $train->train_code = $faker->regexify('[A-Z]{2}[0-9]{6}');
            $train->date= date_format($faker->dateTimeInInterval('-1 years', '+2 years'),'Y-m-d');
            $train->departure_time = $faker->time('H:i:s');
            $train->arrival_time = $faker->time('H:i:s');
            $train->number_carriages = $faker->numberBetween(0, 8);
            $train->in_time = $faker->numberBetween(0, 1);
            $train->deleted = $faker->numberBetween(0, 1);

            $train->slug = $this->generateSlug($train->train_code,$train->departure_station, $train->arrival_station);

            // save train
            $train->save();
        }
    }

    private function generateSlug($train_code,$departure_station,$arrival_station){
        // genero il mio slug
        $slug = $train_code .'-'. $departure_station .'-'. $arrival_station;
        $origina_slug = $slug;

        // controllo se nel mio db esiste già
        $exist = Train::where('slug',$slug)->first();
        $counter=1;
        while($exist){
            $slug = $origina_slug .'-'. $counter;
            $counter++;
            $exist = Train::where('slug',$slug)->first();
        }

        return $slug;
    }
}

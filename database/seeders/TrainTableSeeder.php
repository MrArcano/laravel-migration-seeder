<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class TrainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('it_IT');
        // Seeder with Faker Generator
        for ($i = 0; $i < 10; $i++) {
            $train = new Train();
            $train->company = "Trenitalia";
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



        // Seeder with CSV
        $data_csv = fopen(__DIR__."/trains.csv","r");
        $index = 0;
        while (($row = fgetcsv($data_csv)) !== false) {
            if($index>0){
                $train = new Train();


                $train->company = $row[0];
                $train->departure_station = $row[1];
                $train->arrival_station = $row[2];
                $train->train_code = $row[5];
                $train->date= date('Y-m-d',strtotime($row[3]));
                $train->departure_time = date('H:i:s',strtotime($row[3]));
                $train->arrival_time = date('H:i:s',strtotime($row[4]));
                $train->number_carriages = $row[6];
                $train->in_time = $row[7];
                $train->deleted = $row[8];
                $train->slug = $this->generateSlug($train->train_code,$train->departure_station, $train->arrival_station);

                // save train
                $train->save();
            }
            $index++;
        }
    }

    private function generateSlug($train_code,$departure_station,$arrival_station){
        // genero il mio slug
        $slug = $train_code .'-'. Str::slug($departure_station, '_') .'-'. Str::slug($arrival_station, '_');
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

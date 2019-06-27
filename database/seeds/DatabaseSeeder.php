<?php

use Illuminate\Database\Seeder;

use App\District;
use App\Locality;
use App\Constituencies;
use App\LanguageConstituencies;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LanguageSeeder::class,
            PartySeeder::class,
        ]);

        $file_n = storage_path('database/districts.csv');
        $file = fopen($file_n, "r");
        $data = fgetcsv($file, 500, ",");
        while (($data = fgetcsv($file, 500, ",")) !== FALSE) {
            if (isset($data[0]) and isset($data[1]) and isset($data[2])) {
                if (!Constituencies::where('id', '=', $data[0])->exists()) {
                    $new_constituencie = new Constituencies;
                    $new_constituencie->id = $data[0];
                    $new_constituencie->number_of_voters = ($data[1] == "" ? '0' : $data[1]);
                    $new_constituencie->name = $data[2];
                    $new_constituencie->save();

                    $new_language_constituencie = new LanguageConstituencies;
                    $new_language_constituencie->name = $data[3];
                    $new_language_constituencie->language_id = 2;
                    $new_language_constituencie->constituencies_id = $data[0];
                    $new_language_constituencie->save();
                } else {
                    $constituencie = Constituencies::where('id', '=', $data[0])->first();
                    $language_constituencie = LanguageConstituencies::where('constituencies_id', '=', $data[0])->first();
                    if (strpos($constituencie->name, $data[2]) === false) {
                        $constituencie->name .= ", ".$data[2];
                        $constituencie->save();
                        $language_constituencie->name .= ", ".$data[3];
                        $language_constituencie->save();
                    }
                }
            }
            if (isset($data[2]) and isset($data[4])) {
                $district = District::where('name', '=', $data[2])->first();
                if (!$district) {
                    $district = new District;
                    $district->name = $data[2];
                    $district->save();
                }
                $locality = new Locality;
                $locality->name = $data[4];
                $locality->district_id = $district->id;
                $locality->save();
            }
//            if (isset($data[6]) and isset($data[7])) {
//
//            }
        }
        fclose($file);

        $this->call([
            CandidateSeeder::class,
            PostsSeeder::class,
            PostContentSeeder::class,
            SectionSeeder::class,
            DistrictConstituenciesSeeder::class,
            LanguageDistrictSeeder::class,
            LanguageLocalitySeeder::class
        ]);

    }
}

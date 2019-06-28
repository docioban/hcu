<?php

use Illuminate\Database\Seeder;

use App\District;
use App\Locality;
use App\Constituencies;
use App\LanguageConstituencies;
use App\Section;
use App\LanguageLocality;
use App\LanguageDistrict;

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
                if (!($constituencie= Constituencies::where('constituency_id', $data[0])->first())) {
                    $constituencie = new Constituencies;
                    $constituencie->constituency_id= $data[0];
                    $constituencie->number_of_voters = ($data[1] == "" ? '0' : $data[1]);
                    $constituencie->save();
                    $language_constituencie = new LanguageConstituencies;
                    $language_constituencie->name = $data[2];
                    $language_constituencie->language_id = 1;
                    $language_constituencie->constituencies_id = $constituencie->id;
                    $language_constituencie->save();
                    $language_constituencie = new LanguageConstituencies;
                    $language_constituencie->name = $data[3];
                    $language_constituencie->language_id = 2;
                    $language_constituencie->constituencies_id = $constituencie->id;
                    $language_constituencie->save();
                } else {
                    $language_constituencie = LanguageConstituencies::where('constituencies_id', '=', $data[0])->where('language_id', '1')->first();
                    if (strpos($language_constituencie->name, $data[2]) === false) {
                        $language_constituencie->name .= ", " . $data[2];
                        $language_constituencie->save();
                        $language_constituencie = LanguageConstituencies::where('constituencies_id', '=', $data[0])->where('language_id', '2')->first();
                        $language_constituencie->name .= ", " . $data[3];
                        $language_constituencie->save();
                    }
                }
            }
            if (isset($data[2]) and isset($data[4])) {
                $language_district = LanguageDistrict::where('name', $data[2])->first();
                if (!$language_district) {
                    $district = new District;
                    $district->save();
                    $language_district = new LanguageDistrict;
                    $language_district->name = $data[2];
                    $language_district->language_id = 1;
                    $language_district->district_id = $district->id;
                    $language_district->save();
                    $language_district = new LanguageDistrict;
                    $language_district->name = $data[3];
                    $language_district->language_id = 2;
                    $language_district->district_id = $district->id;
                    $language_district->save();
                }
                $locality = new Locality;
                $locality->district_id = $language_district->district_id;
                $locality->constituencies_id = $constituencie->id;
                $locality->save();
                $language_locality = new LanguageLocality;
                $language_locality->name = $data[4];
                $language_locality->language_id = 1;
                $language_locality->locality_id = $locality->id;
                $language_locality->save();
                $language_locality = new LanguageLocality;
                $language_locality->name = $data[5];
                $language_locality->language_id = 2;
                $language_locality->locality_id = $locality->id;
                $language_locality->save();
                if (isset($data[6]) and isset($data[7]) and $data[6] and $data[7]) {
                    $section = new Section;
                    $section->number = $data[6];
                    $section->address = $data[7];
                    $section->locality_id = $locality->id;
                    $section->save();
                }
            }
        }
        fclose($file);

        $this->call([
            CandidateSeeder::class,
            PostsSeeder::class,
            PostContentSeeder::class,
            DistrictConstituenciesSeeder::class,
        ]);

    }
}

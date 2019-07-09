<?php

use Illuminate\Database\Seeder;

use App\District;
use App\Locality;
use App\Constituency;
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
        $search_replace_ro = array('Raionul ', 'Municipiul');
        $search_replace_ru = array('Район ', 'Муниципий ');

        $file_n = storage_path('database/districts.csv');
        $file = fopen($file_n, "r");
        $data = fgetcsv($file, 500, ",");
        while (($data = fgetcsv($file, 500, ",")) !== FALSE) {
            if (isset($data[0]) and isset($data[1]) and isset($data[2])) {
                if (!($constituency = Constituency::where('constituency_name', $data[0])->first())) {
                    $constituency = new Constituency;
                    $constituency->constituency_name = Str::lower($data[0]);
                    $constituency->slug = 'circumscriptia-' . $data[0];
                    $constituency->number_of_voters = ($data[1] == "" ? '0' : $data[1]);
                    $constituency->save();
                    $language_constituency = new LanguageConstituencies;
                    $language_constituency->name = str_replace($search_replace_ro, '', Str::title($data[2]));
                    $language_constituency->language = 'ro';
                    $language_constituency->constituency_id = $constituency->id;
                    $language_constituency->save();
                    $language_constituency = new LanguageConstituencies;
                    $language_constituency->name = str_replace($search_replace_ru, '', Str::title($data[3]));
                    $language_constituency->language = 'ru';
                    $language_constituency->constituency_id = $constituency->id;
                    $language_constituency->save();
                } else {
                    $language_constituency = LanguageConstituencies::where('constituency_id', $constituency->id)->where('language', 'ro')->first();
                    if (strpos($language_constituency->name, str_replace($search_replace_ro, '', Str::title($data[2]))) === false) {
                        $language_constituency->name .= ", " . str_replace($search_replace_ro, '', Str::title($data[2]));
                        $language_constituency->save();
                        $language_constituency = LanguageConstituencies::where('constituency_id', $constituency->id)->where('language', 'ru')->first();
                        $language_constituency->name .= ", " . str_replace($search_replace_ru, '', Str::title($data[3]));
                        $language_constituency->save();
                    }
                }
                if (isset($data[2]) and isset($data[4])) {
                    $language_district = LanguageDistrict::where('name', $data[2])->first();
                    if (!$language_district) {
                        $district = new District;
                        $district->save();
                        $language_district = new LanguageDistrict;
                        $language_district->name = Str::lower($data[3]);
                        $language_district->language = 'ru';
                        $language_district->district_id = $district->id;
                        $language_district->save();
                        $language_district = new LanguageDistrict;
                        $language_district->name = Str::lower($data[2]);
                        $language_district->language = 'ro';
                        $language_district->district_id = $district->id;
                        $language_district->save();
                    }
                    if (!Locality::where('name', $data[4])->exists()) {
                        $locality = new Locality;
                        $locality->district_id = $language_district->district_id;
                        $locality->constituency_id = $constituency->id;
                        $locality->name = Str::lower($data[4]);
                        $locality->district_id = $language_district->district_id;
                        $locality->isCity = 0;
                        $locality->constituency_id = $constituency->id;
                        $locality->save();
                        $language_locality = new LanguageLocality;
                        $language_locality->name = Str::lower($data[4]);
                        $language_locality->language = 'ro';
                        $language_locality->locality_id = $locality->id;
                        $language_locality->save();
                        $language_locality = new LanguageLocality;
                        $language_locality->name = Str::lower($data[5]);
                        $language_locality->language = 'ru';
                        $language_locality->locality_id = $locality->id;
                        $language_locality->save();
                        if (isset($data[6]) and isset($data[7]) and $data[6] and $data[7]) {
                            $section = new Section;
                            $section->number = $data[6];
                            $section->address = Str::lower($data[7]);
                            $section->locality_id = $locality->id;
                            $section->save();
                            $locality->isCity = 1;
                        }
                    }
                }
            }
        }
        fclose($file);
        $this->call([
            VoyagerDatabaseSeeder::class,
        ]);
    }
}

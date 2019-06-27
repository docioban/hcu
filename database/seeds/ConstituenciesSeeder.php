<?php

use App\District;
use Illuminate\Database\Seeder;

use App\Constituencies;
use App\LanguageConstituencies;

class ConstituenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

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
        }
        fclose($file);
    }
}

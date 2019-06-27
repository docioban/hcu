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

<<<<<<< HEAD
=======
<<<<<<< HEAD
        // DB::table('circumscriptions')->insert([
        //     ['nume' => 'Chișinau'],
        //     ['nume' => 'Briceni, Ocnița'],
        //     ['nume' => 'Ocnița, Dondușeni'],
        //     ['nume' => 'Edineț'],
        //     ['nume' => 'Rîscani, Drochia, Dondușeni'],
        //     ['nume' => 'Glodeni, Rîscani'],
        //     ['nume' => 'Drochia, Donduseni, Soroca'],
        //     ['nume' => 'Soroca'],
        //     ['nume' => 'Florești'],
        //     ['nume' => 'Bălți 1'],
        //     ['nume' => 'Bălți 2'],
        //     ['nume' => 'Fălesti'],
        //     ['nume' => 'Sîngerei, Florești'],
        //     ['nume' => 'Șoldănești, Rezina(or. Rezzina)'],
        //     ['nume' => 'Telenești, Șoldănești, Orhei'],
        //     ['nume' => 'Călărași, Ungheni'],
        //     ['nume' => 'Ungheni'],
        //     ['nume' => 'Nisporeni, Strașeni'],
        //     ['nume' => 'Orhei, Călărași'],
        //     ['nume' => 'Orhei, Rezina, Criuleni, Dubăsari'],
        //     ['nume' => 'Strașeni, Orhei'],
        //     ['nume' => 'Criuleni, Dubăsari'],
        //     ['nume' => 'Ialoveni, Strașeni, Călărași'],
        //     ['nume' => 'Municipiul Chișinău'],
        //     ['nume' => 'Municipiul Chișinău'],
        //     ['nume' => 'Municipiul Chișinău'],
        //     ['nume' => 'Municipiul Chișinău'],
        //     ['nume' => 'Municipiul Chișinău'],
        //     ['nume' => 'Municipiul Chișinău'],
        //     ['nume' => 'Municipiul Chișinău'],
        //     ['nume' => 'Municipiul Chișinău'],
        //     ['nume' => 'Municipiul Chișinău'],
        //     ['nume' => 'Municipiul Chișinău'],
        //     ['nume' => 'Municipiul Chișinău'],
        //     ['nume' => 'Anenii Noi'],
        //     ['nume' => 'Caușeni, Anenii Noi'],
        //     ['nume' => 'Ștefan Voda'],
        //     ['nume' => 'Ialoveni, Căușeni'],
        //     ['nume' => 'Hîncesti'],
        //     ['nume' => 'Cimișlia, Leova, Hîncești'],
        //     ['nume' => 'Basarabeasca, Cimișlia'],
        //     ['nume' => 'Leova, Cantemir'],
        //     ['nume' => 'Cantemir, Cahul'],
        //     ['nume' => 'Cahul'],
        //     ['nume' => 'Taraclia'],
        //     ['nume' => 'UTA Găgăuzia 1'],
        //     ['nume' => 'UTA Găgăuzia 2'],
        //     ['nume' => 'Transnistria'],
        //     ['nume' => 'Transnistria - Tiraspol'],
        //     ['nume' => 'Zona de Est'],
        //     ['nume' => 'Zona de West'],
        //     ['nume' => 'Alte țari și zone al lumii'],
        // ]);

        DB::table('deputats')->insert([
            'circumscription_id' => 1,
            'name' => 'Ghita',
            'date' => '19-04-2019',
            'location' => 'Everest',
            'civil_state' => 'casatorit',
            'function' => 'deputat',
            'studies' => '9 clase',
            'partid' => 'PDM',
            'description' => 'o vindut mers s class cu 50 mii de lei'
=======
        DB::table('circumscripties')->insert([
            ['nume' => 'Chișinau'],
            ['nume' => 'Briceni, Ocnița'],
            ['nume' => 'Ocnița, Dondușeni'],
            ['nume' => 'Edineț'],
            ['nume' => 'Rîscani, Drochia, Dondușeni'],
            ['nume' => 'Glodeni, Rîscani'],
            ['nume' => 'Drochia, Donduseni, Soroca'],
            ['nume' => 'Soroca'],
            ['nume' => 'Florești'],
            ['nume' => 'Bălți 1'],
            ['nume' => 'Bălți 2'],
            ['nume' => 'Fălesti'],
            ['nume' => 'Sîngerei, Florești'],
            ['nume' => 'Șoldănești, Rezina(or. Rezzina)'],
            ['nume' => 'Telenești, Șoldănești, Orhei'],
            ['nume' => 'Călărași, Ungheni'],
            ['nume' => 'Ungheni'],
            ['nume' => 'Nisporeni, Strașeni'],
            ['nume' => 'Orhei, Călărași'],
            ['nume' => 'Orhei, Rezina, Criuleni, Dubăsari'],
            ['nume' => 'Strașeni, Orhei'],
            ['nume' => 'Criuleni, Dubăsari'],
            ['nume' => 'Ialoveni, Strașeni, Călărași'],
            ['nume' => 'Municipiul Chișinău'],
            ['nume' => 'Municipiul Chișinău'],
            ['nume' => 'Municipiul Chișinău'],
            ['nume' => 'Municipiul Chișinău'],
            ['nume' => 'Municipiul Chișinău'],
            ['nume' => 'Municipiul Chișinău'],
            ['nume' => 'Municipiul Chișinău'],
            ['nume' => 'Municipiul Chișinău'],
            ['nume' => 'Municipiul Chișinău'],
            ['nume' => 'Municipiul Chișinău'],
            ['nume' => 'Municipiul Chișinău'],
            ['nume' => 'Anenii Noi'],
            ['nume' => 'Caușeni, Anenii Noi'],
            ['nume' => 'Ștefan Voda'],
            ['nume' => 'Ialoveni, Căușeni'],
            ['nume' => 'Hîncesti'],
            ['nume' => 'Cimișlia, Leova, Hîncești'],
            ['nume' => 'Basarabeasca, Cimișlia'],
            ['nume' => 'Leova, Cantemir'],
            ['nume' => 'Cantemir, Cahul'],
            ['nume' => 'Cahul'],
            ['nume' => 'Taraclia'],
            ['nume' => 'UTA Găgăuzia 1'],
            ['nume' => 'UTA Găgăuzia 2'],
            ['nume' => 'Transnistria'],
            ['nume' => 'Transnistria - Tiraspol'],
            ['nume' => 'Zona de West'],
            ['nume' => 'Zona de West'],
            ['nume' => 'Alte țari și zone al lumii'],
>>>>>>> eef3a77269079c84fcbc53ee88dd32d36de9823b
        ]);
>>>>>>> origin/master
    }
}

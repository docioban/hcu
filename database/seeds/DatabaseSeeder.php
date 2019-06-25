<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Mishanea',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'api_token' => Str::random(60),
        ]);

        DB::table('circumscriptions')->insert([
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
            ['nume' => 'Zona de Est'],
            ['nume' => 'Zona de West'],
            ['nume' => 'Alte țari și zone al lumii'],
        ]);

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
        ]);
    }
}
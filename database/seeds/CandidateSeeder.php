<?php

use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candidate')->insert([
            [
                'slug' => 'Ghenadie-Buza',
                'name' => 'Ghenadie Buza',
                'date' => '1964-06-07',
                'location' => 's. Șipoteni, r.Ancesti, Republica Moldova',
                'civil_status' => 'Casatorit cu Liliana Buzu. Doi copii',
                'function' => '17 iulie 2015 - prezent Presedintele raionului Hincesti',
                'studies' => 'Academia de Administrare Publica Universitatea de Stat de Medicina si Farmacie „Nicolae Testemițeanu”',
                'party_id' => '1',
                'constituency_id' => '1'
            ]
        ]);
    }
}

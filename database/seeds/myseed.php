<?php

use Illuminate\Database\Seeder;

class myseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('party')->insert([
            'name' => 'PDM',
            'photo' => 'photo',
        ]);

        // DB::table('candidate')->insert([
        //     'party_id' => '1',
        //     'constituency_id' => '1',
        //     'slug' => 'Ghenadie-Buza',
        //     'name' => 'Ghenadie Buza',
        //     'location' => 'Chisinau',
        //     'civil_status' => 'insurat',
        //     'function' => 'deputat',
        //     'studies' => 'clasa 9-a',
        //     'date' => '1999-03-14'
        // ]);

        DB::table('post')->insert([
            'candidate_id' => '1',
            'language' => 'ro',
            'type'=> '1',
            'title'=> 'This is title',
            'subtitle'=> 'This is subtitle',
            'body'=> 'This is body',
        ]);
    }
}

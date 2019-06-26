<?php

use Illuminate\Database\Seeder;

class LanguageLocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('language_locality')->insert([
            ['name' => 'Sireti', 'language_id' => '2', 'locality_id' => '1']
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class LanguageDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('language_district')->insert([
            ['name' => 'Анений Ной', 'language_id' => '2', 'district_id' => '1']
        ]);
    }
}

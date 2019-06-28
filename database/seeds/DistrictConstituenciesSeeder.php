<?php

use Illuminate\Database\Seeder;

class DistrictConstituenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('district_constituencies')->insert([
            ['district_id' => '1', 'constituency_id' => '1']
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section')->insert([
            ['number' => '1', 'address' => 'Gimnaziu nr.49', 'locality_id' => '1']
        ]);
    }
}

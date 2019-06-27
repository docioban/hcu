<?php

use Illuminate\Database\Seeder;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locality')->insert([
            ['name' => 'Sireti', 'district_id' => '1']
        ]);
    }
}


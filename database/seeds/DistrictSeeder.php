<?php

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
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
        $all_data = array();
        while ( ($data = fgetcsv($file, 200, ",") ) !== FALSE) {

            print_r($data);
        }
        fclose($file);

        print_r($all_data);

        DB::table('district')->insert([
            ['name' => 'Anenii Noi'],
        ]);
    }
}
<?php

use Illuminate\Database\Seeder;

use App\District;
use App\Locality;


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
        $data = fgetcsv($file, 500, ",");
        while (($data = fgetcsv($file, 500, ",")) !== FALSE) {
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
        }
        fclose($file);
    }
}
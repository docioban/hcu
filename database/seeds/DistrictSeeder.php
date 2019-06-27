<?php

use Illuminate\Database\Seeder;

use App\District;

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
            if (isset($data[2]))
                if (!District::where('name', '=', $data[2])->exists())
                    DB::table('district')->insert([
                        ['name' => $data[2]]
                    ]);
        }
        fclose($file);
    }
}
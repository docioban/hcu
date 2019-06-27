<?php

use Illuminate\Database\Seeder;

use App\Locality;

class LocalitySeeder extends Seeder
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
            if (isset($data[4]))
                if (!Locality::where('name', '=', $data[4])->exists())
                    DB::table('locality')->insert([
                        ['name' => $data[4]]
                    ]);
        }
        fclose($file);
    }
}


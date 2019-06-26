<?php

use Illuminate\Database\Seeder;

class PartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('party')->insert([
            ['name' => 'Partidul democrat din Moldova', 'photo' => 'address of photo'],
            ['name' => 'Partidul liberal', 'photo' => 'address of photo']
        ]);
    }
}

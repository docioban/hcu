<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LanguageSeeder::class,
            PartySeeder::class,
            ConstituenciesSeeder::class,
            CandidateSeeder::class,
            PostsSeeder::class,
            PostContentSeeder::class,
            DistrictSeeder::class,
            LocalitySeeder::class,
            SectionSeeder::class,
            DistrictConstituenciesSeeder::class,
            LanguageDistrictSeeder::class,
            LanguageLocalitySeeder::class
        ]);
    }
}

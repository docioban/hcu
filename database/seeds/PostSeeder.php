<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post')->insert([
            ['title' => 'Brief', 'type' => '1', 'subtitle' => '', 'body' => 'Wozniak a proiectat și dezvoltat Apple I în 1976', 'language_id' => '1'],
            ['title' => 'Scurt', 'type' => '1', 'subtitle' => '', 'body' => 'Возняк спроектировал и разработал Apple I в 1976 году', 'language_id' => '2']
        ]);
    }
}

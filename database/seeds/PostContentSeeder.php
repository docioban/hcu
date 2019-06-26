<?php

use Illuminate\Database\Seeder;

class PostContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_content')->insert([
            ['title' => 'Brief', 'subtitle' => '', 'body' => 'Wozniak a proiectat și dezvoltat Apple I în 1976', 'language_id' => '1', 'post_id' => '1'],
            ['title' => 'Scurt', 'subtitle' => '', 'body' => 'Возняк спроектировал и разработал Apple I в 1976 году', 'language_id' => '2', 'post_id' => '1']
        ]);
    }
}

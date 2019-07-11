<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {

            User::create([
                'role_id'        => 1,
                'name'           => 'Mishanea',
                'email'          => 'admin@gmail.com',
                'password'       => bcrypt('admin'),
                'remember_token' => Str::random(60),
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Stiliyan Ivanov',
            'email' => 'stilian02ivanov@gmail.com',
            'password' => bcrypt('88888888'),
            'is_admin' => true,
            ]);

        User::create([
            'name' => 'John Smith',
            'email' => 'johnsmith@gmail.com',
            'password' => bcrypt('johnsmith1989'),
            'is_admin' => true,
            ]);
    }
}

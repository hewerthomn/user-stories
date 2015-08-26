<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Lorem Ipsum',
            'email' => 'lorem@ispum.com',
            'password' => bcrypt('123456')
        ]);
    }
}

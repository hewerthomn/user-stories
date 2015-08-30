<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\StatusStory::insert([
            [
                'id' => 1,
                'name' => 'To do',
                'type' => 'Story'
            ],
            [
                'id' => 2,
                'name' => 'Doing',
                'type' => 'Story'
            ],
            [
                'id' => 3,
                'name' => 'Done',
                'type' => 'Story'
            ],
        ]);
    }
}

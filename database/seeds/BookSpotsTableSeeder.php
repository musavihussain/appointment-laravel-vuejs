<?php

use App\BookSpot;
use App\User;
use Illuminate\Database\Seeder;

class BookSpotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookSpot::create([
            'day_week' => 2,
            'slot_start' => '19:12:32',
            'slot_end' => '20:12:32',
            'status' => 'pending',
            'user_id' => User::all()->random()->id
        ]);
    }
}

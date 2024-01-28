<?php

namespace Database\Seeders;

use App\Models\LotteryGameMatch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LotteryGameMatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LotteryGameMatch::factory(100)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\LotteryGameMatchUser;
use Illuminate\Database\Seeder;

class LotteryGameMatchUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LotteryGameMatchUser::factory(100)->create();
    }
}

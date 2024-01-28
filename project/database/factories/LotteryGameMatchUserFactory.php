<?php

namespace Database\Factories;

use App\Models\LotteryGameMatch;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LotteryGameMatchUser>
 */
class LotteryGameMatchUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::get()->random()->id,
            'lottery_game_match_id' => LotteryGameMatch::get()->random()->id
        ];
    }
}

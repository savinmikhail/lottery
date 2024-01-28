<?php

namespace App\Listeners;

use App\Events\BeforeLotteryGameUserSaved;
use App\Models\LotteryGameMatchUser;

class LotteryGameUserUniqueListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * restrict the repetitive enrollings
     * @param  \App\Events\BeforeLotteryGameUserSaved  $event
     * @return false
     */
    public function handle(BeforeLotteryGameUserSaved $event)
    {
        $lotteryGameUser = LotteryGameMatchUser::query()
            ->where('user_id', $event->lotteryGameMatchUser->user_id)
            ->where('lottery_game_match_id', $event->lotteryGameMatchUser->lottery_game_match_id)
            ->first();

        if (!empty($lotteryGameUser)) {
            return false;
        }
    }
}

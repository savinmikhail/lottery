<?php

namespace App\Listeners;

use App\Events\AfterUpdatedLotteryGameMatch;
use App\Models\LotteryGame;
use App\Models\User;

class RewardPointsWinnerUserLotteryGameMatchListener
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
     * add points to the winner
     * @param  \App\Events\AfterUpdatedLotteryGameMatch  $event
     * @return void
     */
    public function handle(AfterUpdatedLotteryGameMatch $event)
    {
        $lotteryGame = LotteryGame::find($event->lotteryGameMatch->game_id);
        $points = $lotteryGame->reward_points;

        $user = User::find($event->lotteryGameMatch->winner_id);
        $user->points += $points;
        $user->save();
    }
}

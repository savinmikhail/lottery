<?php

namespace App\Listeners;

use App\Events\BeforeUpdateLotteryGameMatch;
use App\Models\LotteryGameMatchUser;
use App\Models\User;

class FindWinnerUserLotteryGameMatchListener
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
     * pick the random winner of the match being finished
     * @param  \App\Events\BeforeUpdateLotteryGameMatch  $event
     * @return void
     */
    public function handle(BeforeUpdateLotteryGameMatch $event)
    {
        $usersIds = [];
        $lotteryGameUsers = LotteryGameMatchUser::query()
            ->where('lottery_game_match_id', $event->lotteryGameMatch->id)
            ->get();
        foreach ($lotteryGameUsers as $item) {
            $usersIds[] = $item->user_id;
        }
        $winnerUser = User::find($usersIds[array_rand($usersIds)]);

        $event->lotteryGameMatch->winner_id = $winnerUser->id;
    }
}

<?php

namespace App\Listeners;

use App\Events\BeforeLotteryGameUserSaved;
use App\Models\LotteryGame;
use App\Models\LotteryGameMatch;
use App\Models\LotteryGameMatchUser;

class GamerCountCheckListener
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
     * restrict the enrolling of out-of-range participants
     * @param  \App\Events\BeforeLotteryGameUserSaved  $event
     * @return void
     */
    public function handle(BeforeLotteryGameUserSaved $event)
    {
        $lotteryGameMatch = LotteryGameMatch::find($event->lotteryGameMatchUser->lottery_game_match_id);
        $lotteryGame = LotteryGame::find($lotteryGameMatch->game_id);

        $lotteryGameUsers = LotteryGameMatchUser::query()
            ->where('lottery_game_match_id', $event->lotteryGameMatchUser->lottery_game_match_id)
            ->get();

        if ($lotteryGame->gamer_count <= count($lotteryGameUsers)) {
            return false;
        }
    }
}

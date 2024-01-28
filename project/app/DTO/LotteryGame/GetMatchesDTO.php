<?php

namespace App\DTO\LotteryGame;

final readonly class GetMatchesDTO
{
    public function __construct(
        public int $lottery_game_id,
    ) {
    }
}
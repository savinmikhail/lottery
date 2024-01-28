<?php

namespace App\DTO\LotteryGameMatch;

final readonly class FinishMatchDTO
{
    public function __construct(
        public int $matchId
    ) {
    }
}

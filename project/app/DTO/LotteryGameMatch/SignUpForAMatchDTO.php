<?php

namespace App\DTO\LotteryGameMatch;

final readonly class SignUpForAMatchDTO
{
    public function __construct(
        public int $matchId
    ) {
    }
}
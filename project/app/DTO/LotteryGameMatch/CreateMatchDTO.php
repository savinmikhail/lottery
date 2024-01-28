<?php

namespace App\DTO\LotteryGameMatch;

final readonly class CreateMatchDTO
{
    public function __construct(
        public int $gameId,
        public string $startTime,
        public string $startDate,
    ) {
    }
}
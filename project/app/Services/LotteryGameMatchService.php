<?php

namespace App\Services;

use App\DTO\LotteryGameMatch\CreateMatchDTO;
use App\DTO\LotteryGameMatch\FinishMatchDTO;
use App\Http\Resources\LotteryGameMatch\AlreadyFinishedResource;
use App\Http\Resources\LotteryGameMatch\CreateMatchResource;
use App\Http\Resources\LotteryGameMatch\FinishedResource;
use App\Models\LotteryGameMatch;

final readonly class LotteryGameMatchService
{
    public function createMatch(CreateMatchDTO $dto): CreateMatchResource
    {
        $lotteryGame = LotteryGameMatch::query()->create([
            'game_id' => $dto->gameId,
            'start_date' => $dto->startDate,
            'start_time' => $dto->startTime,
            'is_finished' => false,
        ]);

        return new CreateMatchResource($lotteryGame);
    }

    public function setAsFinished(FinishMatchDTO $dto): AlreadyFinishedResource|FinishedResource
    {
        $lotteryGameMatch = LotteryGameMatch::query()->find($dto->matchId);

        if ($lotteryGameMatch->is_finished) {
            return new AlreadyFinishedResource($lotteryGameMatch);
        }

        $lotteryGameMatch->update(['is_finished' => true]);
        return new FinishedResource($lotteryGameMatch);
    }
}

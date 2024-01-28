<?php

namespace App\Services;
use App\DTO\LotteryGame\GetMatchesDTO;
use App\Http\Resources\LotteryGame\LotteryGameCollection;
use App\Http\Resources\LotteryGameMatch\GameMatchesCollection;
use App\Models\LotteryGame;
use App\Models\LotteryGameMatch;

final readonly class LotteryGameService
{
    public function getLotteryGames(): LotteryGameCollection
    {
        return new LotteryGameCollection(LotteryGame::with('matches')->get());
    }

    public function getMatches(GetMatchesDTO $dto): GameMatchesCollection
    {
        return new GameMatchesCollection(LotteryGameMatch::query()
            ->where('game_id', $dto->lottery_game_id)
            ->get());
    }
}

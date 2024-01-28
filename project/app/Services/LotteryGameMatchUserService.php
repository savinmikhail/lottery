<?php

namespace App\Services;

use App\DTO\LotteryGameMatch\CreateMatchDTO;
use App\DTO\LotteryGameMatch\FinishMatchDTO;
use App\DTO\LotteryGameMatch\SignUpForAMatchDTO;
use App\Http\Resources\LotteryGameMatch\AlreadyFinishedResource;
use App\Http\Resources\LotteryGameMatch\CreateMatchResource;
use App\Http\Resources\LotteryGameMatch\FinishedResource;
use App\Http\Resources\LotteryGameMatchUser\SingUpCompletedResource;
use App\Http\Resources\LotteryGameMatchUser\SingUpRestrictedResource;
use App\Models\LotteryGameMatch;
use App\Models\LotteryGameMatchUser;
use Illuminate\Support\Facades\Auth;

final readonly class LotteryGameMatchUserService
{
    public function signUpForAMatch(SignUpForAMatchDTO $dto): SingUpRestrictedResource|SingUpCompletedResource
    {
        // if (LotteryGameMatchUser::query()->where([
        //     'user_id' => Auth::id(),
        //     'lottery_game_match_id' => $dto->matchId,
        // ])->exists()) {
        //     return new SingUpRestrictedResource([]);
        // }
        $lotteryGameMatchUser = LotteryGameMatchUser::query()->create([
            'user_id' => Auth::id(),
            'lottery_game_match_id' => $dto->matchId,
        ]);
        return new SingUpCompletedResource($lotteryGameMatchUser);
    }
}

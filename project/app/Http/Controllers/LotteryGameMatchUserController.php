<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpForAMatchRequest;
use App\Services\LotteryGameMatchUserService;
use Illuminate\Http\JsonResponse;

class LotteryGameMatchUserController extends Controller
{
    public function __construct(private readonly LotteryGameMatchUserService $matchUserService)
    {
    }

    public function signUpForAMatch(SignUpForAMatchRequest $request): JsonResponse
    {
        return $this->matchUserService->signUpForAMatch($request->toDTO())->response();
    }
}

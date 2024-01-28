<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetMatchesRequest;
use App\Services\LotteryGameService;
use Symfony\Component\HttpFoundation\JsonResponse;

class LotteryGameController extends Controller
{
    public function __construct(private readonly LotteryGameService $lotteryGameService)
    {
    }

    public function showAll(): JsonResponse
    {
        return $this->lotteryGameService->getLotteryGames()->response();
    }

    public function showById(GetMatchesRequest $request): JsonResponse
    {
        return $this->lotteryGameService->getMatches($request->toDTO())->response();
    }
}

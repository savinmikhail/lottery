<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinishMatchRequest;
use App\Http\Requests\StoreLotteryGameMatchRequest;
use App\Services\LotteryGameMatchService;
use Illuminate\Http\JsonResponse;

class LotteryGameMatchController extends Controller
{
    public function __construct(private readonly LotteryGameMatchService $lotteryGameMatchService)
    {
    }

    public function createMatch(StoreLotteryGameMatchRequest $request): JsonResponse
    {
        return $this->lotteryGameMatchService->createMatch($request->toDTO())->response();
    }

    public function setAsFinished(FinishMatchRequest $request)
    {
        return $this->lotteryGameMatchService->setAsFinished($request->toDTO())->response();
    }
}

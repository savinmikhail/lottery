<?php

namespace App\Http\Resources\LotteryGameMatchUser;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

final class SingUpCompletedResource extends JsonResource
{
    public function toArray($request)
    {
        return [ 
            'id' => $this->id,
            'lottery_game_match_id' => $this->lottery_game_match_id,
            'user_id' => $this->user_id
        ];
    }

    public function with($request)
    {
        return [
            'message' => 'You have been signed up for this match successfully.',
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_OK);
    }
}

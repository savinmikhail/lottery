<?php

namespace App\Http\Resources\LotteryGameMatch;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

final class CreateMatchResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'game_id' => $this->game_id,
            'start_time' => $this->start_time,
            'start_date' => $this->start_date,
            'winner_id' => $this->winner_id,
        ];
    }

    public function with($request)
    {
        return [
            'message' => 'Match saved successfully',
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_CREATED);
    }
}

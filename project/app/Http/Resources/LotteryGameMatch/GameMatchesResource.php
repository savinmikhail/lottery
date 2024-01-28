<?php

namespace App\Http\Resources\LotteryGameMatch;

use Illuminate\Http\Resources\Json\JsonResource;

final class GameMatchesResource extends JsonResource
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
 
}

<?php

namespace App\Http\Resources\LotteryGame;

use Illuminate\Http\Resources\Json\JsonResource;

final class MatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'start_date' => $this->start_date,
            'start_time' => $this->start_time,
            'winner_id' => $this->winner_id,
            'is_finished' => $this->is_finished,
        ];
    }



}

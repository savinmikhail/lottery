<?php

namespace App\Http\Resources\LotteryGame;

use Illuminate\Http\Resources\Json\JsonResource;

final class LotteryGameResource extends JsonResource
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
            'name' => $this->name,
            'gamer_count' => $this->gamer_count,
            'reward_points' => $this->reward_points,
            'matches' => MatchResource::collection($this->whenLoaded('matches')),
        ];
    }
}

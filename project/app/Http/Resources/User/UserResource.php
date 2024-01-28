<?php

namespace App\Http\Resources\User;

use App\Http\Resources\LotteryGame\MatchResource;
use Illuminate\Http\Resources\Json\JsonResource;

final class UserResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'is_admin' => $this->is_admin,
            'points' => $this->points,
            'lottery_game_match' => MatchResource::collection($this->whenLoaded('lotteryGameMatch')),
        ];
    }

}

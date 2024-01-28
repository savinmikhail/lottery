<?php

namespace App\Http\Resources\LotteryGameMatch;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

final class AlreadyFinishedResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
        ];
    }

    public function with($request)
    {
        return [
            'message' => 'Match already has been finished',
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_NOT_ACCEPTABLE);
    }
}

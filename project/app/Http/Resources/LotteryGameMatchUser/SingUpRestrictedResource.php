<?php

namespace App\Http\Resources\LotteryGameMatchUser;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

final class SingUpRestrictedResource extends JsonResource
{
    public function toArray($request)
    {
        return [];
    }

    public function with($request)
    {
        return [
            'message' => 'You have already signed up for this match.',
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_NOT_ACCEPTABLE);
    }
}

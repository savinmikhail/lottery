<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

final class UnauthorizedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [];
    }

    public function with($request)
    {
        return [
            'message' => 'You are not authorized to perform this action.',
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_UNAUTHORIZED);
    }
}

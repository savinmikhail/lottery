<?php

namespace App\Services;
use App\DTO\User\LoginUserDTO;
use App\Http\Resources\User\AuthenticatedResource;
use App\Http\Resources\User\UnauthenticatedResource;
use Illuminate\Http\JsonResponse;


final readonly class AuthService
{
    public function login(LoginUserDTO $dto): UnauthenticatedResource|AuthenticatedResource
    {
        $token = auth()->attempt(['email' => $dto->email, 'password' => $dto->password]);
        if (!$token) {
            return new UnauthenticatedResource([]);
        }

        return new AuthenticatedResource([
            'token_type' => 'Bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'token' => $token,
        ]);
    }

}
<?php

namespace App\DTO\User;

final readonly class LoginUserDTO
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
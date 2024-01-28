<?php

namespace App\DTO\User;

final readonly class RegisterDTO
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
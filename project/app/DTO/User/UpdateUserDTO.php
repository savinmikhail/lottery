<?php

namespace App\DTO\User;

final readonly class UpdateUserDTO
{
    public function __construct(
        public ?string $first_name,
        public ?string $last_name,
        public ?string $email,
        public ?string $password,
        public ?bool $is_admin,
    ) {
    }
}
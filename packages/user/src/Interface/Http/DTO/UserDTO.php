<?php

declare(strict_types=1);

namespace Chords\User\Interface\Http\DTO;

readonly class UserDTO
{
    public function __construct(
        public string $id,
        public string $login,
        public string $createdAt,
        public string $updatedAt,
    ) {
    }
}

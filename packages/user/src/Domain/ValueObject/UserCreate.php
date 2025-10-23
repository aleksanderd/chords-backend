<?php

declare(strict_types=1);

namespace Chords\User\Domain\ValueObject;

/**
 * Данные для создания сущности User.
 */
final readonly class UserCreate
{
    public function __construct(
        public Login $login,
        public Password $password,
    ) {
    }
}

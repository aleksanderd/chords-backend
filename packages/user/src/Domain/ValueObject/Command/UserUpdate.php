<?php

declare(strict_types=1);

namespace Chords\User\Domain\ValueObject\Command;

/**
 * Данные для изменения сущности User.
 */
final readonly class UserUpdate
{
    public function __construct(
        public ?string $login = null,
        public ?string $passwordHash = null,
    ) {
    }
}

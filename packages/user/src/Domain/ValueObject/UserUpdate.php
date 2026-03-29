<?php

declare(strict_types=1);

namespace Chords\User\Domain\ValueObject;

/**
 * Данные для изменения сущности User.
 */
final readonly class UserUpdate
{
    public function __construct(
        public ?Login $login = null,
        public ?Password $password = null,
    ) {
    }
}

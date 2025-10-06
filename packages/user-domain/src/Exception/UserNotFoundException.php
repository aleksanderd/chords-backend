<?php

declare(strict_types=1);

namespace Chords\User\Domain\Exception;

use Chords\Core\Domain\Exception\ModelNotFoundException;
use Chords\User\Domain\Model\UserReadInterface;

class UserNotFoundException extends ModelNotFoundException
{
    public static function getModelClass(): string
    {
        return UserReadInterface::class;
    }

    public static function withLogin(string $login): self
    {
        return new self(sprintf('No such model "%s" with login "%s".', static::getModelClass(), $login));
    }
}

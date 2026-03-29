<?php

declare(strict_types=1);

namespace Chords\User\Domain\Exception;

use Chords\Core\Domain\Exception\AbstractEntityNotFoundException;
use Chords\User\Domain\Entity\UserInterface;

class UserNotFoundException extends AbstractEntityNotFoundException
{
    public static function getEntityClass(): string
    {
        return UserInterface::class;
    }

    public static function withLogin(string $login): self
    {
        return new static(sprintf('login="%s".', $login));
    }
}

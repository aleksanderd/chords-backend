<?php

declare(strict_types=1);

namespace Chords\User\Domain\Exception;

use Chords\Core\Domain\Exception\AbstractEntityDuplicateException;
use Chords\User\Domain\Entity\UserInterface;

class UserDuplicateException extends AbstractEntityDuplicateException
{
    public static function getEntityClass(): string
    {
        return UserInterface::class;
    }
}

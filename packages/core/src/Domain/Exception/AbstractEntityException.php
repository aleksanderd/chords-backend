<?php

declare(strict_types=1);

namespace Chords\Core\Domain\Exception;

abstract class AbstractEntityException extends AbstractException
{
    abstract public static function getEntityClass(): string;
}

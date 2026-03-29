<?php

declare(strict_types=1);

namespace Chords\Core\Domain\Exception;

use Chords\Core\Domain\ValueObject\EntityIdInterface;

abstract class AbstractEntityNotFoundException extends AbstractEntityException
{
    final protected function __construct(string $findBy)
    {
        $message = sprintf('No such "%s" with "%s"', static::getEntityClass(), $findBy);
        parent::__construct($message);
    }

    public static function withId(EntityIdInterface $id): self
    {
        return new static(sprintf('ID="%s".', $id->toString()));
    }
}

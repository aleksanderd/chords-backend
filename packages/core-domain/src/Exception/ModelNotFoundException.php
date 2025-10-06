<?php

declare(strict_types=1);

namespace Chords\Core\Domain\Exception;

use Chords\Core\Domain\Model\OIdInterface;

abstract class ModelNotFoundException extends AbstractException
{
    abstract public static function getModelClass(): string;

    final public function __construct(string $message)
    {
        parent::__construct($message);
    }

    public static function withId(OIdInterface $id): self
    {
        return new static(sprintf('No such model "%s" with ID "%s".', static::getModelClass(), $id->toString()));
    }
}

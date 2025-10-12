<?php

declare(strict_types=1);

namespace Chords\Core\Domain\Entity;

use Chords\Core\Domain\ValueObject\EntityIdInterface;

abstract readonly class AbstractEntityWithId implements EntityWithIdInterface
{
    public function __construct(private EntityIdInterface $id)
    {
    }

    public function getId(): EntityIdInterface
    {
        return $this->id;
    }
}

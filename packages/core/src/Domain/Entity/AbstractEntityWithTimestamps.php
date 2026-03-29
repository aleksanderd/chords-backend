<?php

declare(strict_types=1);

namespace Chords\Core\Domain\Entity;

use Chords\Core\Domain\ValueObject\EntityIdInterface;
use DateTimeImmutable;

abstract readonly class AbstractEntityWithTimestamps extends AbstractEntityWithId implements EntityWithTimestampsInterface
{
    public function __construct(
        EntityIdInterface $id,
        private DateTimeImmutable $createdAt,
        private DateTimeImmutable $updatedAt,
    ) {
        parent::__construct($id);
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }
}

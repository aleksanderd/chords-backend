<?php

declare(strict_types=1);

namespace Chords\Core\Domain\Entity;

interface EntityWithTimestampsInterface extends EntityWithIdInterface
{
    public function getCreatedAt(): \DateTimeImmutable;

    public function getUpdatedAt(): \DateTimeImmutable;
}

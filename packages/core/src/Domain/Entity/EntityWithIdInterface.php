<?php

declare(strict_types=1);

namespace Chords\Core\Domain\Entity;

use Chords\Core\Domain\ValueObject\EntityIdInterface;

interface EntityWithIdInterface
{
    public function getId(): EntityIdInterface;
}

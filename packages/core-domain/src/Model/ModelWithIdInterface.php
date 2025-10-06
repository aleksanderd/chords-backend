<?php

declare(strict_types=1);

namespace Chords\Core\Domain\Model;

interface ModelWithIdInterface
{
    public function getId(): OIdInterface;
}

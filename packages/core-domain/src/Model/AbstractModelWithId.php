<?php

declare(strict_types=1);

namespace Chords\Core\Domain\Model;

abstract readonly class AbstractModelWithId implements ModelWithIdInterface
{
    public function __construct(private OIdInterface $id)
    {
    }

    public function getId(): OIdInterface
    {
        return $this->id;
    }
}

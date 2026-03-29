<?php

declare(strict_types=1);

namespace Chords\Core\Infrastructure\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\UuidV7;

#[ORM\MappedSuperclass]
abstract class AbstractEntityWithId
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    private UuidV7 $id;

    public function __construct()
    {
        $this->id = new UuidV7();
    }

    public function getId(): UuidV7
    {
        return $this->id;
    }
}

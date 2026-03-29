<?php

declare(strict_types=1);

namespace Chords\Core\Infrastructure\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\MappedSuperclass]
abstract class AbstractEntityWithTimestamps extends AbstractEntityWithId
{
    #[ORM\Column(type: 'datetime', nullable: false)]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type: 'datetime', nullable: false)]
    private \DateTimeInterface $updatedAt;

    public function __construct()
    {
        parent::__construct();
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function preUpdate(): void
    {
        $this->updatedAt = new \DateTime();
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }
}

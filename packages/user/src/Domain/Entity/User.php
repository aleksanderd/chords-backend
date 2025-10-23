<?php

declare(strict_types=1);

namespace Chords\User\Domain\Entity;

use Chords\Core\Domain\Entity\AbstractEntityWithTimestamps;
use Chords\Core\Domain\ValueObject\EntityIdInterface;
use Chords\User\Domain\ValueObject\Login;
use Chords\User\Domain\ValueObject\PasswordHash;
use DateTimeImmutable;

final readonly class User extends AbstractEntityWithTimestamps implements UserInterface
{
    public function __construct(
        EntityIdInterface $id,
        DateTimeImmutable $createdAt,
        DateTimeImmutable $updatedAt,
        private Login $login,
        private PasswordHash $passwordHash,
    ) {
        parent::__construct($id, $createdAt, $updatedAt);
    }

    public function getLogin(): Login
    {
        return $this->login;
    }

    public function getPasswordHash(): PasswordHash
    {
        return $this->passwordHash;
    }
}

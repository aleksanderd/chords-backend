<?php

declare(strict_types=1);

namespace Chords\User\Domain\Repository;

use Chords\Core\Domain\ValueObject\EntityIdInterface;
use Chords\User\Domain\Entity\UserInterface;
use Chords\User\Domain\ValueObject\Login;
use Chords\User\Domain\ValueObject\Password;

interface UserRepositoryInteface
{
    public function findById(EntityIdInterface $id): ?UserInterface;

    public function findByLogin(Login $login): ?UserInterface;

    public function isPasswordValid(EntityIdInterface $userId, Password $password): bool;
}

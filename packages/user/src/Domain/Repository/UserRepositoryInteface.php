<?php

declare(strict_types=1);

namespace Chords\User\Domain\Repository;

use Chords\Core\Domain\ValueObject\EntityIdInterface;
use Chords\User\Domain\Entity\UserInterface;
use Chords\User\Domain\ValueObject\Login;

interface UserRepositoryInteface
{
    public function findById(EntityIdInterface $id): ?UserInterface;

    public function findByLogin(Login $login): ?UserInterface;
}

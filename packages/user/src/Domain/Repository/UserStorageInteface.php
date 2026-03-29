<?php

declare(strict_types=1);

namespace Chords\User\Domain\Repository;

use Chords\Core\Domain\ValueObject\EntityIdInterface;
use Chords\User\Domain\Entity\UserInterface;
use Chords\User\Domain\ValueObject\Login;
use Chords\User\Domain\ValueObject\UserCreate;
use Chords\User\Domain\ValueObject\UserUpdate;

interface UserStorageInteface
{
    public function findById(EntityIdInterface $id): ?UserInterface;

    public function findByLogin(Login $login): ?UserInterface;

    public function create(UserCreate $data): UserInterface;

    public function update(EntityIdInterface $id, UserUpdate $update): UserInterface;
}

<?php

declare(strict_types=1);

namespace Chords\User\Domain\Service;

use Chords\Core\Domain\ValueObject\EntityIdInterface;
use Chords\User\Domain\Entity\UserInterface;
use Chords\User\Domain\ValueObject\Login;

interface UserServiceInterface
{
    public function findById(EntityIdInterface $id): ?UserInterface;

    public function findByLogin(Login $login): ?UserInterface;

    public function getById(EntityIdInterface $id): UserInterface;

    public function getByLogin(Login $login): UserInterface;

    public function changeLogin(EntityIdInterface $id, Login $login): UserInterface;
}

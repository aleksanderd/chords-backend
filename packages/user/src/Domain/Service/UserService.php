<?php

declare(strict_types=1);

namespace Chords\User\Domain\Service;

use Chords\Core\Domain\ValueObject\EntityIdInterface;
use Chords\User\Domain\Entity\UserInterface;
use Chords\User\Domain\Exception\UserDuplicateException;
use Chords\User\Domain\Exception\UserNotFoundException;
use Chords\User\Domain\Repository\UserRepositoryInteface;
use Chords\User\Domain\Repository\UserStorageInteface;
use Chords\User\Domain\ValueObject\Command\UserUpdate;
use Chords\User\Domain\ValueObject\Login;

class UserService implements UserServiceInterface
{
    public function __construct(
        private readonly UserRepositoryInteface $userRepository,
        private readonly UserStorageInteface $userStorage
    ) {
    }

    public function findById(EntityIdInterface $id): ?UserInterface
    {
        return $this->userRepository->findById($id);
    }

    public function findByLogin(Login $login): ?UserInterface
    {
        return $this->userRepository->findByLogin($login);
    }

    public function getById(EntityIdInterface $id): UserInterface
    {
        $user = $this->findById($id);
        if (!$user) {
            throw UserNotFoundException::withId($id);
        }

        return $user;
    }

    public function getByLogin(Login $login): UserInterface
    {
        $user = $this->findByLogin($login);
        if (!$user) {
            throw UserNotFoundException::withLogin($login->getValue());
        }

        return $user;
    }

    public function changeLogin(EntityIdInterface $id, Login $login): UserInterface
    {
        $user = $this->userStorage->findByLogin($login);

        if (null !== $user && !$user->getId()->isEqual($id)) {
            throw new UserDuplicateException('login', $login->getValue());
        }

        return $this->userStorage->update($id, new UserUpdate(login: $login));
    }
}

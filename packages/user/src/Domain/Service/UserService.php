<?php

declare(strict_types=1);

namespace Chords\User\Domain\Service;

use Chords\Core\Domain\ValueObject\EntityIdInterface;
use Chords\User\Domain\Entity\UserInterface;
use Chords\User\Domain\Exception\UserDuplicateException;
use Chords\User\Domain\Exception\UserNotFoundException;
use Chords\User\Domain\Repository\UserRepositoryInteface;
use Chords\User\Domain\Repository\UserStorageInteface;
use Chords\User\Domain\ValueObject\Login;
use Chords\User\Domain\ValueObject\UserCreate;
use Chords\User\Domain\ValueObject\UserUpdate;

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
        if (null === $user) {
            throw UserNotFoundException::withId($id);
        }

        return $user;
    }

    public function getByLogin(Login $login): UserInterface
    {
        $user = $this->findByLogin($login);
        if (null === $user) {
            throw UserNotFoundException::withLogin($login->getValue());
        }

        return $user;
    }

    public function create(UserCreate $data): UserInterface
    {
        $user = $this->userStorage->findByLogin($data->login);
        if (null !== $user) {
            throw new UserDuplicateException('login', $data->login->getValue());
        }

        return $this->userStorage->create($data);
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

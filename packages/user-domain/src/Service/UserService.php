<?php

declare(strict_types=1);

namespace Chords\User\Domain\Service;

use Chords\Core\Domain\Model\OIdInterface;
use Chords\User\Domain\Exception\UserNotFoundException;
use Chords\User\Domain\Model\UserReadInterface;
use Chords\User\Domain\Repository\UserReadRepositoryInteface;
use Chords\User\Domain\Repository\UserWriteRepositoryInteface;

class UserService
{
    public function __construct(
        private readonly UserReadRepositoryInteface $userReadRepository,
        private readonly UserWriteRepositoryInteface $userWriteRepository
    ) {
    }

    public function findById(OIdInterface $id): ?UserReadInterface
    {
        return $this->userReadRepository->findById($id);
    }

    public function findByLogin(string $login): ?UserReadInterface
    {
        return $this->userReadRepository->findByLogin($login);
    }

    public function getById(OIdInterface $id): UserReadInterface
    {
        $user = $this->findById($id);
        if (!$user) {
            throw UserNotFoundException::withId($id);
        }

        return $user;
    }

    public function getByLogin(string $login): UserReadInterface
    {
        $user = $this->findByLogin($login);
        if (!$user) {
            throw UserNotFoundException::withLogin($login);
        }

        return $user;
    }
}

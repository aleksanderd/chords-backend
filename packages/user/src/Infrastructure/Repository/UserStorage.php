<?php

declare(strict_types=1);

namespace Chords\User\Infrastructure\Repository;

use Chords\Core\Domain\ValueObject\EntityIdInterface;
use Chords\User\Domain\Entity\UserInterface;
use Chords\User\Domain\Exception\UserNotFoundException;
use Chords\User\Domain\Repository\UserStorageInteface;
use Chords\User\Domain\ValueObject\UserCreate;
use Chords\User\Domain\ValueObject\UserUpdate;
use Chords\User\Infrastructure\Entity\User;

class UserStorage extends AbstractUserRepository implements UserStorageInteface
{
    public function create(UserCreate $data): UserInterface
    {
        $user = new User(login: $data->login->getValue());

        $passwordHash = $this->passwordHasher->hashPassword($user, $data->password->getValue());
        $user->setPassword($passwordHash);

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        return $this->getDomainUser($user);
    }

    public function update(EntityIdInterface $id, UserUpdate $update): UserInterface
    {
        /** @var User|null $user */
        $user = $this->findOneBy(['id' => $id]);
        if (!$user) {
            throw UserNotFoundException::withId($id);
        }

        if ($login = $update->login?->getValue()) {
            $user->setLogin($login);
        }

        if ($password = $update->password?->getValue()) {
            $passwordHash = $this->passwordHasher->hashPassword($user, $password);
            $user->setPassword($passwordHash);
        }

        $this->getEntityManager()->flush();

        return $this->getDomainUser($user);
    }
}

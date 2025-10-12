<?php

declare(strict_types=1);

namespace Chords\User\Infrastructure\Repository;

use Chords\Core\Domain\ValueObject\EntityIdInterface;
use Chords\User\Domain\Entity\UserInterface;
use Chords\User\Domain\Exception\UserNotFoundException;
use Chords\User\Domain\Repository\UserStorageInteface;
use Chords\User\Domain\ValueObject\Command\UserUpdate;
use Chords\User\Infrastructure\Entity\User;

class UserStorage extends AbstractUserRepository implements UserStorageInteface
{
    public function update(EntityIdInterface $id, UserUpdate $update): UserInterface
    {
        /** @var User|null $user */
        $user = $this->findOneBy(['id' => $id]);
        if (!$user) {
            throw UserNotFoundException::withId($id);
        }

        if ($login = $update->login) {
            $user->setLogin($login);
        }

        if ($passwordHash = $update->passwordHash) {
            $user->setPasswordHash($passwordHash);
        }

        $this->getEntityManager()->flush();

        return $this->getDomainUser($user);
    }
}

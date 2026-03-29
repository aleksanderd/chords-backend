<?php

declare(strict_types=1);

namespace Chords\User\Infrastructure\Repository;

use Chords\Core\Domain\ValueObject\EntityIdInterface;
use Chords\User\Domain\Repository\UserRepositoryInteface;
use Chords\User\Domain\ValueObject\Password;

class UserRepository extends AbstractUserRepository implements UserRepositoryInteface
{
    public function isPasswordValid(EntityIdInterface $id, Password $password): bool
    {
        $user = $this->findOneBy(['id' => $id->toString()]);

        if (!$user) {
            return false;
        }

        return $this->passwordHasher->isPasswordValid($user, $password->getValue());
    }
}

<?php

declare(strict_types=1);

namespace Chords\User\Infrastructure\Repository;

use Chords\Core\Domain\ValueObject\EntityIdInterface;
use Chords\Core\Infrastructure\ValueObject\EntityId;
use Chords\User\Domain\Entity\User as DomainUser;
use Chords\User\Domain\Entity\UserInterface;
use Chords\User\Domain\ValueObject\Login;
use Chords\User\Domain\ValueObject\PasswordHash;
use Chords\User\Infrastructure\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @extends ServiceEntityRepository<User>
 */
abstract class AbstractUserRepository extends ServiceEntityRepository
{
    public function __construct(
        ManagerRegistry $registry,
        protected readonly UserPasswordHasherInterface $passwordHasher,
    ) {
        parent::__construct($registry, User::class);
    }

    protected function getDomainUser(User $user): DomainUser
    {
        return new DomainUser(
            id: new EntityId($user->getId()),
            login: new Login($user->getLogin()),
            passwordHash: new PasswordHash($user->getPassword()),
            createdAt: \DateTimeImmutable::createFromMutable($user->getCreatedAt()),
            updatedAt: \DateTimeImmutable::createFromMutable($user->getUpdatedAt()),
        );
    }

    public function findById(EntityIdInterface $id): ?UserInterface
    {
        $user = $this->findOneBy(['id' => $id->toString()]);

        return $user ? $this->getDomainUser($user) : null;
    }

    public function findByLogin(Login $login): ?UserInterface
    {
        $user = $this->findOneBy(['login' => $login->getValue()]);

        return $user ? $this->getDomainUser($user) : null;
    }
}

<?php

declare(strict_types=1);

namespace Chords\User\Infrastructure\Repository;

use Chords\Core\Domain\ValueObject\EntityIdInterface;
use Chords\Core\Infrastructure\ValueObject\EntityId;
use Chords\User\Domain\Entity\User as DomainUser;
use Chords\User\Domain\Entity\UserInterface;
use Chords\User\Domain\ValueObject\Login;
use Chords\User\Infrastructure\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 */
abstract class AbstractUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    protected function getDomainUser(User $user): DomainUser
    {
        return new DomainUser(
            id: new EntityId($user->getId()),
            login: new Login($user->getLogin()),
            passwordHash: $user->getPasswordHash(),
            createdAt: \DateTimeImmutable::createFromMutable($user->getCreatedAt()),
            updatedAt: \DateTimeImmutable::createFromMutable($user->getUpdatedAt()),
        );
    }

    public function findById(EntityIdInterface $id): ?UserInterface
    {
        $entity = $this->findOneBy(['id' => $id->toString()]);

        return $entity ? $this->getDomainUser($entity) : null;
    }

    public function findByLogin(Login $login): ?UserInterface
    {
        $entity = $this->findOneBy(['login' => $login->getValue()]);

        return $entity ? $this->getDomainUser($entity) : null;
    }
}

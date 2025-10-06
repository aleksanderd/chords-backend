<?php

declare(strict_types=1);

namespace Chords\User\Domain\Infrastructure\Repository;

use Chords\Core\Domain\Model\OIdInterface;
use Chords\User\Domain\Model\UserReadInterface;

interface UserReadRepositoryInteface
{
    public function findById(OIdInterface $id): ?UserReadInterface;

    public function findByLogin(string $login): ?UserReadInterface;
}

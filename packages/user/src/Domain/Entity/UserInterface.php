<?php

declare(strict_types=1);

namespace Chords\User\Domain\Entity;

use Chords\Core\Domain\Entity\EntityWithTimestampsInterface;
use Chords\User\Domain\ValueObject\Login;
use Chords\User\Domain\ValueObject\PasswordHash;

interface UserInterface extends EntityWithTimestampsInterface
{
    public function getLogin(): Login;

    public function getPasswordHash(): PasswordHash;
}

<?php

declare(strict_types=1);

namespace Chords\User\Domain\Model;

use Chords\Core\Domain\Model\ModelWithIdInterface;

interface UserReadInterface extends ModelWithIdInterface
{
    public function getLogin(): string;
}

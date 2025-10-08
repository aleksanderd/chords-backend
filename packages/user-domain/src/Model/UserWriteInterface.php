<?php

declare(strict_types=1);

namespace Chords\User\Domain\Model;

use Chords\Core\Domain\Model\ModelWithIdInterface;

interface UserWriteInterface extends ModelWithIdInterface
{
    public function getLogin(): string;

    public function changeLogin(): void;
}

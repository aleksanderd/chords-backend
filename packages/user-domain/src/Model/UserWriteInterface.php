<?php

declare(strict_types=1);

namespace Chords\User\Domain\Model;

interface UserWriteInterface extends UserReadInterface
{
    public function changeLogin(): void;
}

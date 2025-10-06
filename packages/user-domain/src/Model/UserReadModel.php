<?php

declare(strict_types=1);

namespace Chords\User\Domain\Model;

use Chords\Core\Domain\Model\AbstractModelWithId;
use Chords\Core\Domain\Model\OIdInterface;

readonly class UserReadModel extends AbstractModelWithId implements UserReadInterface
{
    public function __construct(
        private OIdInterface $id,
        private string $login
    ) {
        parent::__construct($id);
    }

    public function getLogin(): string
    {
        return $this->login;
    }
}

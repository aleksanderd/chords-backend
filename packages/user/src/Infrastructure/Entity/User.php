<?php

declare(strict_types=1);

namespace Chords\User\Infrastructure\Entity;

use Chords\Core\Infrastructure\Entity\AbstractEntityWithTimestamps;
use Chords\User\Domain\ValueObject\Login;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: '`user`')]
#[ORM\UniqueConstraint(name: 'user_login_uniq_idx', columns: ['login'])]
class User extends AbstractEntityWithTimestamps
{
    #[ORM\Column(type: 'string', length: Login::MAX_LENGTH, unique: true, nullable: false)]
    private string $login;

    #[ORM\Column(type: 'string', nullable: false)]
    private string $passwordHash;

    public function __construct(string $login, string $passwordHash)
    {
        parent::__construct();
        $this->login = $login;
        $this->passwordHash = $passwordHash;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): static
    {
        $this->login = $login;

        return $this;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function setPasswordHash(string $passwordHash): static
    {
        $this->passwordHash = $passwordHash;

        return $this;
    }
}

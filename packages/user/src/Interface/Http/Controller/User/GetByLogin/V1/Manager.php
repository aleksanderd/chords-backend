<?php

declare(strict_types=1);

namespace Chords\User\Interface\Http\Controller\User\GetByLogin\V1;

use Chords\User\Domain\Service\UserServiceInterface;
use Chords\User\Domain\ValueObject\Login;

class Manager
{
    public function __construct(private readonly UserServiceInterface $userService)
    {
    }

    public function getByLogin(string $login): DTO\ResponseDTO
    {
        $user = $this->userService->getByLogin(new Login($login));

        return new DTO\ResponseDTO(
            id: $user->getId()->toString(),
            login: $user->getLogin()->getValue(),
            createdAt: $user->getCreatedAt()->format(\DateTime::ATOM),
            updatedAt: $user->getUpdatedAt()->format(\DateTime::ATOM),
        );
    }
}

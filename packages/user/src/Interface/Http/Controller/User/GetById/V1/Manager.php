<?php

declare(strict_types=1);

namespace Chords\User\Interface\Http\Controller\User\GetById\V1;

use Chords\Core\Infrastructure\ValueObject\EntityId;
use Chords\User\Domain\Service\UserServiceInterface;

class Manager
{
    public function __construct(private readonly UserServiceInterface $userService)
    {
    }

    public function getById(string $id): DTO\ResponseDTO
    {
        $user = $this->userService->getById(EntityId::fromString($id));

        return new DTO\ResponseDTO(
            id: $user->getId()->toString(),
            login: $user->getLogin()->getValue(),
            createdAt: $user->getCreatedAt()->format(\DateTime::ATOM),
            updatedAt: $user->getUpdatedAt()->format(\DateTime::ATOM),
        );
    }
}

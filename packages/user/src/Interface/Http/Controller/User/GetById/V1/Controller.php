<?php

declare(strict_types=1);

namespace Chords\User\Interface\Http\Controller\User\GetById\V1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
class Controller extends AbstractController
{
    public function __construct(private readonly Manager $manager)
    {
    }

    #[Route(path: '/v1/user/getById/{id}', methods: ['GET'])]
    public function __invoke(string $id): DTO\ResponseDTO
    {
        return $this->manager->getById($id);
    }
}

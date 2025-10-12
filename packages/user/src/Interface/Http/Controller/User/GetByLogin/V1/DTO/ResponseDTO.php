<?php

declare(strict_types=1);

namespace Chords\User\Interface\Http\Controller\User\GetByLogin\V1\DTO;

use Chords\Core\Interface\Http\DTO\ResponseDTOInterface;
use Chords\User\Interface\Http\DTO\UserDTO;

readonly class ResponseDTO extends UserDTO implements ResponseDTOInterface
{
}

<?php

declare(strict_types=1);

namespace Chords\User\Domain\ValueObject;

use Chords\Core\Assertion\Assert;
use Chords\Core\Domain\ValueObject\AbstractSlug;

final readonly class Login extends AbstractSlug
{
    public const MIN_LENGTH = 3;
    public const MAX_LENGTH = 32;

    public function validate(string $value): void
    {
        parent::validate($value);
        Assert::startsWithLetter($value);
    }
}

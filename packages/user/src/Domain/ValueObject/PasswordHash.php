<?php

declare(strict_types=1);

namespace Chords\User\Domain\ValueObject;

use Chords\Core\Assertion\Assert;

final readonly class PasswordHash
{
    public function __construct(private string $value)
    {
        Assert::notEmpty($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

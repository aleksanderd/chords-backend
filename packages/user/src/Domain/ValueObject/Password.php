<?php

declare(strict_types=1);

namespace Chords\User\Domain\ValueObject;

use Chords\Core\Assertion\Assert;

final readonly class Password
{
    public const MIN_LENGTH = 6;
    public const MAX_LENGTH = 255;

    public function __construct(private string $value)
    {
        Assert::minLength($value, static::MIN_LENGTH);
        Assert::maxLength($value, static::MAX_LENGTH);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

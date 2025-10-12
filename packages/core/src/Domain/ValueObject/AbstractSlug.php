<?php

declare(strict_types=1);

namespace Chords\Core\Domain\ValueObject;

use Chords\Core\Assertion\Assert;

abstract readonly class AbstractSlug
{
    public const MIN_LENGTH = 3;
    public const MAX_LENGTH = 100;

    public function __construct(private string $value)
    {
        $this->validate($value);
    }

    protected function validate(string $value): void
    {
        Assert::slug($value);
        Assert::minLength($value, static::MIN_LENGTH);
        Assert::maxLength($value, static::MAX_LENGTH);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}

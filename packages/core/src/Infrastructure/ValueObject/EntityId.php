<?php

declare(strict_types=1);

namespace Chords\Core\Infrastructure\ValueObject;

use Chords\Core\Domain\ValueObject\EntityIdInterface;
use Symfony\Component\Uid\UuidV7;

class EntityId implements EntityIdInterface
{
    final public function __construct(private UuidV7 $value)
    {
    }

    public function getValue(): UuidV7
    {
        return $this->value;
    }

    public static function fromString(string $value): static
    {
        return new static(UuidV7::fromString($value));
    }

    public static function fromBinary(string $value): static
    {
        return new static(UuidV7::fromBinary($value));
    }

    public function toString(): string
    {
        return $this->value->toRfc4122();
    }

    public function toBinary(): string
    {
        return $this->value->toBinary();
    }

    public function isEqual(mixed $value): bool
    {
        if (is_string($value)) {
            $value = static::fromString($value);
        }

        if ($value instanceof EntityIdInterface) {
            if (!$value instanceof EntityId) {
                $value = static::fromString($value->toString());
            }
            $value = $value->getValue();
        }

        return $this->value->equals($value);
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}

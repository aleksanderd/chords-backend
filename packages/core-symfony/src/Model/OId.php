<?php

declare(strict_types=1);

namespace Chords\Core\Symfony\Model;

use Chords\Core\Domain\Model\OIdInterface;
use Symfony\Component\Uid\UuidV7;

class OId implements OIdInterface
{
    final private function __construct(private UuidV7 $value)
    {
    }

    public static function next(): static
    {
        return new static(new UuidV7());
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public static function fromString(string $value): static
    {
        return new static(UuidV7::fromString($value));
    }

    public function toString(): string
    {
        return $this->value->toRfc4122();
    }

    public static function fromBinary(string $value): static
    {
        return new static(UuidV7::fromBinary($value));
    }

    public function toBinary(): string
    {
        return $this->value->toBinary();
    }
}

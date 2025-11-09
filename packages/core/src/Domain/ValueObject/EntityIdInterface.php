<?php

declare(strict_types=1);

namespace Chords\Core\Domain\ValueObject;

interface EntityIdInterface
{
    public static function fromString(string $value): static;

    public static function fromBinary(string $value): static;

    public function toString(): string;

    public function toBinary(): string;

    public function isEqual(mixed $id): bool;
}

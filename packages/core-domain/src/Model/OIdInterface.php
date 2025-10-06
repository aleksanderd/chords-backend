<?php

declare(strict_types=1);

namespace Chords\Core\Domain\Model;

interface OIdInterface
{
    public static function next(): static;

    public static function fromString(string $value): static;

    public function toString(): string;

    public static function fromBinary(string $value): static;

    public function toBinary(): string;
}

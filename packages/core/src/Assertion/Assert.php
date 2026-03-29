<?php

declare(strict_types=1);

namespace Chords\Core\Assertion;

use Webmozart\Assert\Assert as WebmozartAssert;

class Assert extends WebmozartAssert
{
    public static function slug(mixed $value): void
    {
        static::string($value);
        static::lower($value);
        static::regex($value, '/^[a-z0-9_-]+$/');
    }
}

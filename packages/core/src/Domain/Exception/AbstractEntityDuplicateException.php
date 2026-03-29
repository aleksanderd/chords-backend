<?php

declare(strict_types=1);

namespace Chords\Core\Domain\Exception;

abstract class AbstractEntityDuplicateException extends AbstractEntityException
{
    public function __construct(public readonly string $field, public readonly mixed $duplicateValue)
    {
        $strValue = (string) $duplicateValue;
        $strField = sprintf('%s::%s', static::getEntityClass(), $field);

        $message = sprintf('Duplicate value "%s" for %s', $strValue, $strField);
        parent::__construct($message);
    }
}

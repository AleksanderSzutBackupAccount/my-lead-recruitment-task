<?php

declare(strict_types=1);

namespace Src\Common\Domain\ValueObject;

abstract class NumberValueObject
{
    public function __construct(protected readonly float $value)
    {
    }

    public static function fromValue(float $value): static
    {
        return new static($value);
    }
}

<?php

declare(strict_types=1);

namespace Src\Common\Domain\ValueObject;

abstract class StringValueObject
{
    public function __construct(protected readonly string $value)
    {
    }

    public static function fromValue(string $value): static
    {
        return new static($value);
    }
}

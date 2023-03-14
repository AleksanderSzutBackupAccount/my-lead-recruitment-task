<?php

declare(strict_types=1);

namespace Src\Common\Domain\ValueObject;

abstract class StringValueObject implements ValueObject
{
    public function __construct(protected readonly string $value)
    {
    }

    public static function fromValue(string $value): static
    {
        return new static($value);
    }

    public function value(): string
    {
        return $this->value;
    }
}

<?php

declare(strict_types=1);

namespace Src\Common\Domain\ValueObject;

abstract class NumberValueObject implements ValueObject
{
    public function __construct(protected readonly float $value)
    {
    }

    public static function fromValue(float $value): self
    {
        return new static($value);
    }

    public function value(): float
    {
        return $this->value;
    }
}

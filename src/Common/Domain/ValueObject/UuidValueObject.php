<?php

declare(strict_types=1);

namespace Src\Common\Domain\ValueObject;

use Ramsey\Uuid\Uuid as RamseyUuid;
use Src\Common\Domain\Exceptions\ValueObject\UuidInvalidException;
use Src\Common\Domain\UuidGenerator;

class UuidValueObject implements ValueObject
{
    final public function __construct(protected readonly string $value)
    {
        $this->assertIsValidUuid($value);
    }

    private function assertIsValidUuid(string $id): void
    {
        if (!RamseyUuid::isValid($id)) {
            throw new UuidInvalidException($id);
        }
    }

    public static function random(UuidGenerator $generator): static
    {
        return new static($generator->generate());
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

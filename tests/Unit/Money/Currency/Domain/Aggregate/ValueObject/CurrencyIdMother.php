<?php

declare(strict_types=1);

namespace Tests\Unit\Money\Currency\Domain\Aggregate\ValueObject;

use Src\Money\Currency\Domain\ValueObject\CurrencyId;
use Tests\Unit\Common\Domain\UuidMother;

class CurrencyIdMother
{
    public static function create(?string $value = null): CurrencyId
    {
        return CurrencyId::fromValue($value ?? UuidMother::create());
    }
}

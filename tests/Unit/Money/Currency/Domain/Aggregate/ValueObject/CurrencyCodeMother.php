<?php

declare(strict_types=1);

namespace Tests\Unit\Money\Currency\Domain\Aggregate\ValueObject;

use Src\Money\Currency\Domain\ValueObject\CurrencyCode;
use Tests\Unit\Common\Domain\MotherCreator;

class CurrencyCodeMother
{
    public static function create(?string $value = null): CurrencyCode
    {
        return CurrencyCode::fromValue($value ?? MotherCreator::random()->currencyCode());
    }
}

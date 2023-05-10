<?php

declare(strict_types=1);

namespace Tests\Unit\Money\Currency\Domain\Aggregate\ValueObject;

use Src\Money\Currency\Domain\ValueObject\CurrencyExchangeRate;

class CurrencyExchangeRateMother
{
    public static function create(float $value = 1): CurrencyExchangeRate
    {
        return CurrencyExchangeRate::fromValue($value);
    }
}

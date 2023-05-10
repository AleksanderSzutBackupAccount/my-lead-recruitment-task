<?php

declare(strict_types=1);

namespace Tests\Unit\Money\Currency\Domain\Aggregate\ValueObject;

use Src\Money\Currency\Domain\ValueObject\CurrencyName;
use Tests\Unit\Common\Domain\WordMother;

class CurrencyNameMother
{
    public static function create(?string $value = null): CurrencyName
    {
        return CurrencyName::fromValue($value ?? WordMother::create());
    }
}

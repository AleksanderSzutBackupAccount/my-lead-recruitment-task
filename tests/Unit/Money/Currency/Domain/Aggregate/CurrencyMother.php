<?php

declare(strict_types=1);

namespace Tests\Unit\Money\Currency\Domain\Aggregate;

use Src\Money\Currency\Domain\Aggregate\Currency;
use Src\Money\Currency\Domain\ValueObject\CurrencyCode;
use Src\Money\Currency\Domain\ValueObject\CurrencyExchangeRate;
use Src\Money\Currency\Domain\ValueObject\CurrencyId;
use Src\Money\Currency\Domain\ValueObject\CurrencyName;
use Tests\Unit\Money\Currency\Domain\Aggregate\ValueObject\CurrencyCodeMother;
use Tests\Unit\Money\Currency\Domain\Aggregate\ValueObject\CurrencyExchangeRateMother;
use Tests\Unit\Money\Currency\Domain\Aggregate\ValueObject\CurrencyIdMother;
use Tests\Unit\Money\Currency\Domain\Aggregate\ValueObject\CurrencyNameMother;

class CurrencyMother
{
    public static function create(
        ?CurrencyId $id = null,
        ?CurrencyCode $code = null,
        ?CurrencyName $name = null,
        ?CurrencyExchangeRate $exchangeRate = null,
    ): Currency {
        return new Currency(
            $id ?? CurrencyIdMother::create(),
            $code ?? CurrencyCodeMother::create(),
            $name ?? CurrencyNameMother::create(),
            $exchangeRate ?? CurrencyExchangeRateMother::create(),
        );
    }
}

<?php

declare(strict_types=1);

namespace Src\Money\Currency\Domain\Aggregate;

use Src\Common\Domain\Aggregate\AggregateRoot;
use Src\Money\Currency\Domain\ValueObject\CurrencyCode;
use Src\Money\Currency\Domain\ValueObject\CurrencyExchangeRate;
use Src\Money\Currency\Domain\ValueObject\CurrencyId;
use Src\Money\Currency\Domain\ValueObject\CurrencyName;

final class Currency extends AggregateRoot
{
    public function __construct(
        public readonly CurrencyId $id,
        public readonly CurrencyCode $code,
        public readonly CurrencyName $name,
        public readonly CurrencyExchangeRate $exchangeRate,
    ) {
    }

    public static function fromPrimitives(
        string $id,
        string $name,
        string $code,
        float $exchangeRate
    ): self {
        return new self(
            CurrencyId::fromValue($id),
            CurrencyCode::fromValue($code),
            CurrencyName::fromValue($name),
            CurrencyExchangeRate::fromValue($exchangeRate),
        );
    }
}

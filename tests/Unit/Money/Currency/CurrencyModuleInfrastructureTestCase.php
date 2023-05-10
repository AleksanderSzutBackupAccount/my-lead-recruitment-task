<?php

declare(strict_types=1);

namespace Tests\Unit;

use Src\Money\Currency\Domain\Persistence\CurrencyRepository;
use Tests\Unit\Money\Common\Infrastructure\PhpUnit\MoneyContextInfrastructureTestCase;

abstract class CurrencyModuleInfrastructureTestCase extends MoneyContextInfrastructureTestCase
{
    protected function repository(): CurrencyRepository
    {
        return $this->service(CurrencyRepository::class);
    }
}

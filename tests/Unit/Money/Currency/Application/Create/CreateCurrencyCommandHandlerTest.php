<?php

declare(strict_types=1);

namespace Tests\Unit\Money\Currency\Application\Create;

use Src\Money\Currency\Application\Commands\Create\CreateCurrencyCommandHandler;
use Tests\Unit\Money\Currency\CurrencyModuleUnitTestCase;
use Tests\Unit\Money\Currency\Domain\Aggregate\CurrencyMother;

final class CreateCurrencyCommandHandlerTest extends CurrencyModuleUnitTestCase
{
    private CreateCurrencyCommandHandler $handler;

    public function testItShouldCreateABoard(): void
    {
        $currency = CurrencyMother::create();
        $command = CreateCurrencyCommandMother::create(
            $currency->id,
            $currency->code,
            $currency->name,
            $currency->exchangeRate,
        );
        $this->shouldNotFindById(
            $currency->id
        );
        $this->shouldSave($currency);

        $this->dispatch($command, $this->handler);
        $this->assertOk();
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateCurrencyCommandHandler(
            $this->creator(),
        );
    }
}

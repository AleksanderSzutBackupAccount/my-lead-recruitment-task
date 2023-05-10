<?php

declare(strict_types=1);

namespace Tests\Unit\Money\Currency\Application\Create;

use Src\Money\Currency\Application\Commands\Create\CreateCurrencyCommand;
use Src\Money\Currency\Domain\ValueObject\CurrencyCode;
use Src\Money\Currency\Domain\ValueObject\CurrencyExchangeRate;
use Src\Money\Currency\Domain\ValueObject\CurrencyId;
use Src\Money\Currency\Domain\ValueObject\CurrencyName;
use Tests\Unit\Money\Currency\CurrencyModuleUnitTestCase;
use Tests\Unit\Money\Currency\Domain\Aggregate\CurrencyMother;

class CreateCurrencyCommandMother extends CurrencyModuleUnitTestCase
{
    public static function create(
        ?CurrencyId $id = null,
        ?CurrencyCode $code = null,
        ?CurrencyName $name = null,
        ?CurrencyExchangeRate $exchangeRate = null,
    ): CreateCurrencyCommand {
        $board = CurrencyMother::create($id, $code, $name, $exchangeRate;

        return new CreateCurrencyCommand(
            $board->id->value(),
            $board->code->value(),
            $board->name->value(),
            $board->exchangeRate->value()
        );
    }
}

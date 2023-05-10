<?php

declare(strict_types=1);

namespace Src\Money\Currency\Application\Commands\Create;

use Src\Common\Domain\Bus\Command\CommandHandler;
use Src\Money\Currency\Domain\ValueObject\CurrencyCode;
use Src\Money\Currency\Domain\ValueObject\CurrencyExchangeRate;
use Src\Money\Currency\Domain\ValueObject\CurrencyId;
use Src\Money\Currency\Domain\ValueObject\CurrencyName;

final readonly class CreateCurrencyCommandHandler implements CommandHandler
{
    public function __construct(private CurrencyCreator $creator)
    {
    }

    public function __invoke(CreateCurrencyCommand $command): void
    {
        $this->creator->__invoke(
            new CurrencyId($command->id),
            new CurrencyCode($command->code),
            new CurrencyName($command->name),
            new CurrencyExchangeRate($command->exchangeRate)
        );
    }
}

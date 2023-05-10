<?php

declare(strict_types=1);

namespace Src\Money\Currency\Application\Commands\Create;

use Src\Common\Domain\Bus\Command\Command;

final readonly class CreateCurrencyCommand implements Command
{
    public function __construct(
        public string $id,
        public string $code,
        public string $name,
        public float $exchangeRate
    ) {
    }
}

<?php

declare(strict_types=1);

namespace Src\Money\Currency\Application\Commands\Create;

use Src\Common\Domain\Bus\Command\Command;

final readonly class CreateCurrencyCommand implements Command
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getExchangeRate(): float
    {
        return $this->exchangeRate;
    }

    public function __construct(
        private string $id,
        private string $code,
        private string $name,
        private float $exchangeRate
    ) {
    }
}

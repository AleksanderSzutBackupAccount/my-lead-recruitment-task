<?php

declare(strict_types=1);

namespace Src\Money\Currency\Application\Commands\Create;

use App\Kanban\Board\Domain\Board;
use Src\Common\Domain\Bus\Event\EventBus;
use Src\Money\Currency\Domain\Aggregate\Currency;
use Src\Money\Currency\Domain\Exceptions\CurrencyNotFound;
use Src\Money\Currency\Domain\Persistence\CurrencyRepository;
use Src\Money\Currency\Domain\ValueObject\CurrencyCode;
use Src\Money\Currency\Domain\ValueObject\CurrencyExchangeRate;
use Src\Money\Currency\Domain\ValueObject\CurrencyId;
use Src\Money\Currency\Domain\ValueObject\CurrencyName;

final readonly class CurrencyCreator
{
    public function __construct(
        private CurrencyRepository $repository,
        private EventBus $bus
    ) {
    }

    public function __invoke(
        CurrencyId $id,
        CurrencyCode $code,
        CurrencyName $name,
        CurrencyExchangeRate $rate
    ): void {
        $course = new Currency($id, $code, $name, $rate);

        try {
            $currency = $this->repository->findOrFail($id);
        } catch (CurrencyNotFound) {
            return;
        }

        $currency = new Currency($id, $code, $name, $rate);

        $this->repository->save($currency);
        $this->bus->publish(...$course->pullDomainEvents());
    }
}

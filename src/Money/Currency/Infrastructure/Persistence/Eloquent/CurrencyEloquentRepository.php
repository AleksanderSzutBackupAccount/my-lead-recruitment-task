<?php

declare(strict_types=1);

namespace Src\Money\Currency\Infrastructure\Persistence\Eloquent;

use Src\Money\Currency\Domain\Aggregate\Currency;
use Src\Money\Currency\Domain\Exceptions\CurrencyNotFound;
use Src\Money\Currency\Domain\Persistence\CurrencyRepository as CurrencyRepositoryInterface;
use Src\Money\Currency\Domain\ValueObject\CurrencyCode;
use Src\Money\Currency\Domain\ValueObject\CurrencyId;

final readonly class CurrencyEloquentRepository implements CurrencyRepositoryInterface
{
    public function __construct(private CurrencyEloquentModel $model)
    {
    }

    /**
     * @throws CurrencyNotFound
     */
    public function findOrFail(CurrencyId $id): Currency
    {
        $eloquentCurrency = $this->model->find($id->value());

        if (null === $eloquentCurrency) {
            throw new CurrencyNotFound();
        }

        return $this->toDomain($eloquentCurrency);
    }

    /**
     * @throws CurrencyNotFound
     */
    public function findByCode(CurrencyCode $code): Currency
    {
        $eloquentCurrency = $this->model->where('currency', $code->value());

        if (null === $eloquentCurrency) {
            throw new CurrencyNotFound();
        }

        return $this->toDomain($eloquentCurrency);
    }

    private function toDomain(
        CurrencyEloquentModel $eloquentBoardModel
    ): Currency {
        return Currency::fromPrimitives(
            $eloquentBoardModel->id,
            $eloquentBoardModel->code,
            $eloquentBoardModel->name,
            $eloquentBoardModel->exchange_rate,
        );
    }

    public function save(
        Currency $currency
    ): void {
        try {
            $currencyModel = $this->findByCode($currency->code);
        } catch (CurrencyNotFound $e) {

        }

    }
}

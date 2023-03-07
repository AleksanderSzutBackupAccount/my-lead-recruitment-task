<?php

declare(strict_types=1);

namespace Src\Money\Currency\Infrastructure\Persistence\Eloquent;

use Src\Money\Currency\Domain\Entity\Currency;
use Src\Money\Currency\Domain\Exceptions\CurrencyNotFound;
use Src\Money\Currency\Domain\Persistence\CurrencyRepository as CurrencyRepositoryInterface;
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
        $eloquentBoard = $this->model->find($id->value());

        if (null === $eloquentBoard) {
            throw new CurrencyNotFound();
        }

        return $this->toDomain($eloquentBoard);
    }

    /**
     * @throws CurrencyNotFound
     */
    public function findByCode(CurrencyId $id): Currency
    {
        throw new CurrencyNotFound();
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
}

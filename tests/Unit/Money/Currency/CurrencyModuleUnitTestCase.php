<?php

declare(strict_types=1);

namespace Tests\Unit\Money\Currency;

use Mockery\MockInterface;
use Prophecy\Prophecy\ObjectProphecy;
use Src\Money\Currency\Domain\Aggregate\Currency;
use Src\Money\Currency\Domain\Persistence\CurrencyRepository;
use Src\Money\Currency\Domain\ValueObject\CurrencyId;
use Tests\Unit\Money\Common\Infrastructure\PhpUnit\MoneyContextInfrastructureTestCase;

abstract class CurrencyModuleUnitTestCase extends MoneyContextInfrastructureTestCase
{
    private $repository;

    private $repositoryProphecy;

    protected function shouldNotFindById(CurrencyId $id): void
    {
        $this->repositoryProphecy()->find($id)->willReturn(null);
    }

    private function repositoryProphecy(): ObjectProphecy
    {
        return $this->repositoryProphecy = $this->repositoryProphecy ??
            $this->prophecy(CurrencyRepository::class);
    }

    protected function shouldSave(Currency $currency): void
    {
        $this->repositoryProphecy()->save($currency);
    }

    protected function shouldNotSave(Currency $currency): void
    {
        $this->shouldFindById(
            $currency->id,
            $currency
        );
    }

    protected function shouldFindById(CurrencyId $id, Currency $currency): void
    {
        $this->repositoryProphecy()->find($id)->willReturn($currency);
    }

    protected function shouldDelete(CurrencyId $id): void
    {
        $this->repositoryProphecy()->delete($id);
    }

    protected function repository(): MockInterface|CurrencyRepository
    {
        return $this->repository = $this->repository ?? $this->repositoryProphecy()->reveal();
    }
}

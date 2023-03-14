<?php

declare(strict_types=1);

namespace Tests\Unit\Common\Infrastructure\PhpUnit;

use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophet;
use Src\Common\Domain\Bus\Command\Command;
use Src\Common\Domain\Bus\Command\CommandBus;
use Src\Common\Domain\Bus\Event\DomainEvent;
use Src\Common\Domain\Bus\Event\EventBus;
use Src\Common\Domain\Bus\Query\Query;
use Src\Common\Domain\Bus\Query\QueryBus;
use Src\Common\Domain\Bus\Query\Response;

abstract class UnitTestCase extends TestCase
{
    protected Prophet $prophet;

    private ObjectProphecy $queryBusProphecy;

    private QueryBus $queryBus;

    private ObjectProphecy $commandBusProphecy;

    private CommandBus $commandBus;

    private ObjectProphecy $eventBusProphecy;

    private EventBus $eventBus;

    protected function setUp(): void
    {
        $this->prophet = new Prophet();
    }

    protected function tearDown(): void
    {
        $this->prophet->checkPredictions();
    }

    protected function notify(DomainEvent $event, callable $subscriber): void
    {
        $subscriber($event);
    }

    protected function dispatch(
        Command $command,
        callable $commandHandler
    ): void {
        $commandHandler($command);
    }

    protected function assertAskResponse(
        Response $expected,
        Query $query,
        callable $queryHandler
    ): void {
        $actual = $queryHandler($query);

        $this->assertEquals($expected, $actual);
    }

    protected function assertAskThrowsException(
        string $expectedErrorClass,
        Query $query,
        callable $queryHandler
    ): void {
        $this->expectException($expectedErrorClass);

        $queryHandler($query);
    }

    protected function assertAskNullResponse(
        Query $query,
        callable $queryHandler
    ): void {
        $actual = $queryHandler($query);

        $this->assertNull($actual);
    }

    protected function assertOk(): void
    {
        $this->assertTrue(true);
    }

    protected function queryBus(): QueryBus|ObjectProphecy
    {
        return $this->queryBus = $this->queryBus ?? $this->queryBusProphecy()->reveal();
    }

    protected function queryBusProphecy(): ObjectProphecy
    {
        return $this->queryBusProphecy = $this->queryBusProphecy ?? $this->prophecy(QueryBus::class);
    }

    protected function prophecy(string $interface): ObjectProphecy
    {
        return $this->prophet->prophesize($interface);
    }

    protected function commandBus(): CommandBus|ObjectProphecy
    {
        return $this->commandBus = $this->commandBus ?? $this->commandBusProphecy()->reveal();
    }

    protected function commandBusProphecy(): ObjectProphecy
    {
        return $this->commandBusProphecy = $this->commandBusProphecy ?? $this->prophecy(CommandBus::class);
    }

    protected function eventBus(): EventBus|ObjectProphecy
    {
        return $this->eventBus = $this->eventBus ?? $this->eventBusProphecy()->reveal();
    }

    protected function eventBusProphecy(): ObjectProphecy
    {
        return $this->eventBusProphecy = $this->eventBusProphecy ?? $this->prophecy(EventBus::class);
    }
}

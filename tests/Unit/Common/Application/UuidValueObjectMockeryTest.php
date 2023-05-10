<?php

declare(strict_types=1);

namespace Tests\Unit\Common\Application;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Ramsey\Uuid\Uuid as RamseyUuid;
use Src\Common\Domain\Exceptions\ValueObject\UuidInvalidException;
use Src\Common\Domain\ValueObject\UuidValueObject;

class UuidValueObjectMockeryTest extends MockeryTestCase
{
    protected function mockUuidValid(string $param, bool $return): void
    {
        $ramseyMock = Mockery::mock('overload:' . RamseyUuid::class);
        $ramseyMock->expects('isValid')
            ->with($param)
            ->andReturn($return);
    }

    public function testValueObjectValidationSuccess(): void
    {
        $param = 'fa0f717f-87ab-4d9e-85ab-1be52fe2833d';

        $this->mockUuidValid($param, true);

        new UuidValueObject($param);
    }

    public function testValueObjectValidationFailure(): void
    {
        $param = 'bad';

        $this->expectException(UuidInvalidException::class);

        $this->mockUuidValid($param, false);

        new UuidValueObject($param);
    }
}

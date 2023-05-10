<?php

declare(strict_types=1);

namespace Tests\Unit\Common\Application;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Ramsey\Uuid\Uuid as RamseyUuid;
use Src\Common\Domain\UuidGenerator;
use Src\Common\Domain\ValueObject\UuidValueObject;

class UuidValueObjectTest extends MockeryTestCase
{
    protected function mockUuidGenerate(
        string $return,
        int $times = 1
    ): UuidGenerator {
        $uuidGenerator = Mockery::mock(UuidGenerator::class);
        $uuidGenerator->expects('generate')
            ->times($times)
            ->andReturn($return);
        return $uuidGenerator;
    }

    public function testValueRandom(): void
    {
        Mockery::mock('overload:' . RamseyUuid::class)->expects('isValid')
            ->andReturn(true);
        $paramExpected = "bad";
        $paramActual = "valid";

        $exceptedObject = new UuidValueObject($paramExpected);
        $actualResult = UuidValueObject::random(
            $this->mockUuidGenerate($paramActual, 1)
        );

        $this->assertNotSame($actualResult->value(), $exceptedObject->value());
    }
}

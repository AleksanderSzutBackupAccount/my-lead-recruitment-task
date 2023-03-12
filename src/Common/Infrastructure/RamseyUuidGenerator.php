<?php

declare(strict_types=1);

namespace Src\Common\Infrastructure;

use Ramsey\Uuid\Uuid as RamseyUuid;
use Src\Common\Domain\UuidGenerator;

final class RamseyUuidGenerator implements UuidGenerator
{
    public function generate(): string
    {
        return RamseyUuid::uuid4()->toString();
    }
}

<?php

declare(strict_types=1);

namespace Src\Common\Infrastructure;

use App\Shared\Domain\UuidGenerator;
use Ramsey\Uuid\Uuid as RamseyUuid;

final class RamseyUuidGenerator implements UuidGenerator
{
    public function generate(): string
    {
        return RamseyUuid::uuid4()->toString();
    }
}

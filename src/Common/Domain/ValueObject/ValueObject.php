<?php

declare(strict_types=1);

namespace Src\Common\Domain\ValueObject;

interface ValueObject
{
    public function value(): mixed;
}

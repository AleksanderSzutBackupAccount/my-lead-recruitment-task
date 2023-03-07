<?php

declare(strict_types=1);

namespace Src\Common\Domain\Bus\Event;

interface EventBus
{
    public function publish(DomainEvent ...$events): void;
}

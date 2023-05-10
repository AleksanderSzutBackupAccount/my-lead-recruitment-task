<?php

declare(strict_types=1);

namespace Src\Common\Domain\Bus\Event;

interface DomainEventSubscriber
{
    public static function subscribedTo(): array;
}

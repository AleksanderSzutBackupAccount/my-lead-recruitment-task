<?php

declare(strict_types=1);

namespace Src\Common\Infrastructure\Bus;

use Src\Common\Infrastructure\InfrastructureException;
use Throwable;

final class CommandNotRegistered extends InfrastructureException
{
    public function __construct(
        $message = '',
        $code = 0,
        Throwable $previous = null
    ) {
        $message = '' === $message ? 'Command not registered' : $message;
        parent::__construct($message, $code, $previous);
    }
}

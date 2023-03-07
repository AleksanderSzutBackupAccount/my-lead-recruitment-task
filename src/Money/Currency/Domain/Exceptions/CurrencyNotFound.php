<?php

declare(strict_types=1);

namespace Src\Money\Currency\Domain\Exceptions;

use Src\Common\Domain\Exceptions\DomainException;
use Throwable;

class CurrencyNotFound extends DomainException
{
    public function __construct(
        $message = '',
        $code = 0,
        Throwable $previous = null
    ) {
        $message = '' === $message ? 'Currency not found' : $message;

        parent::__construct($message, $code, $previous);
    }
}

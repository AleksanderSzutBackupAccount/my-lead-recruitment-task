<?php

declare(strict_types=1);

namespace Src\Common\Domain\Exceptions;

use Exception;
use Throwable;

abstract class ValueObjectInvalidValueException extends Exception
{
    private const ERROR_MESSAGE = 'Value object Invalid value in: %s Error message: %s';

    public function __construct(
        string $errorMessage = '',
        int $code = 0,
        Throwable $previous = null
    ) {
        $errorMessage = sprintf(
            self::ERROR_MESSAGE,
            self::class,
            $errorMessage
        );

        parent::__construct($errorMessage, $code, $previous);
    }
}

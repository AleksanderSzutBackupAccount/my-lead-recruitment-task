<?php

declare(strict_types=1);

namespace Src\Common\Domain\Exceptions;

use Exception;
use Throwable;

abstract class ValueObjectInvalidValueException extends Exception
{
    private const ERROR_MESSAGE = '`%s` this value is not allowed in value object: %s  additional error message: %s';

    public function __construct(
        string $value = '',
        string $additionalInfo = '',
        int $code = 0,
        Throwable $previous = null
    ) {
        $errorMessage = sprintf(
            self::ERROR_MESSAGE,
            $value,
            self::class,
            $additionalInfo
        );

        parent::__construct($errorMessage, $code, $previous);
    }
}

<?php

namespace App\Exceptions\Shop\Address;

use App\Services\Logger\LoggerInterface;
use Exception;

class AddressException extends Exception
{
    public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        app(LoggerInterface::class)->error('AddressException: ' . $message, [
            'exception' => $previous?->getMessage(),
        ]);
    }
}

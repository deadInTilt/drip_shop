<?php

namespace App\Exceptions\Shop\Console;

use App\Services\Logger\LoggerInterface;
use Exception;

class ConsoleProductImportException extends Exception
{
    public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        app(LoggerInterface::class)->error('ConsoleProductImportException: ' . $message, [
            'exception' => $previous?->getMessage(),
        ]);
    }
}

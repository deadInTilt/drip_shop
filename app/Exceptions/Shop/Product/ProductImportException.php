<?php

namespace App\Exceptions\Shop\Product;

use App\Services\Logger\LoggerInterface;
use Exception;

class ProductImportException extends Exception
{
    public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        app(LoggerInterface::class)->error('ProductImportException: ' . $message, [
            'exception' => $previous?->getMessage(),
        ]);
    }
}

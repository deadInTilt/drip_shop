<?php

namespace App\Exceptions\Shop\Order;

use App\Services\Logger\LoggerInterface;
use Exception;

class OrderCreateException extends Exception
{
    public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        app(LoggerInterface::class)->error('OrderCreateException: ' . $message, [
            'exception' => $previous?->getMessage(),
        ]);
    }
}

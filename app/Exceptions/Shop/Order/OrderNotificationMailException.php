<?php

namespace App\Exceptions\Shop\Order;

use App\Services\Logger\LoggerInterface;
use Exception;

class OrderNotificationMailException extends Exception
{
    public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        app(LoggerInterface::class)->error('OrderNotificationMailException: ' . $message, [
            'exception' => $previous?->getMessage(),
        ]);
    }
}

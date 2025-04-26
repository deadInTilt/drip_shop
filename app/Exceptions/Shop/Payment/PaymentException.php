<?php

namespace App\Exceptions\Shop\Payment;

use App\Services\Logger\LoggerInterface;
use Exception;

class PaymentException extends Exception
{
    public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        app(LoggerInterface::class)->error('PaymentException: ' . $message, [
            'exception' => $previous?->getMessage(),
        ]);
    }
}

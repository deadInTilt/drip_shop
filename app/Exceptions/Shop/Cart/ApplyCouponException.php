<?php

namespace App\Exceptions\Shop\Cart;

use App\Services\Logger\LoggerInterface;
use Exception;

class ApplyCouponException extends Exception
{
    public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        app(LoggerInterface::class)->error('ApplyCouponException: ' . $message, [
            'exception' => $previous?->getMessage(),
        ]);
    }
}

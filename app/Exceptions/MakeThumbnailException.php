<?php

namespace App\Exceptions;

use App\Services\Logger\LoggerInterface;
use Exception;

class MakeThumbnailException extends Exception
{
    public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        app(LoggerInterface::class)->error('MakeThumbnailException: ' . $message, [
            'exception' => $previous?->getMessage(),
        ]);
    }
}

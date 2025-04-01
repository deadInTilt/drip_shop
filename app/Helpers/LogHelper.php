<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class LogHelper
{
    public static function logError(string $message, array $context = []): void
    {
        Log::error($message, $context);
    }

    public static function logInfo(string $message, array $context = []): void
    {
        Log::info($message, $context);
    }

    public static function logWarning(string $message, array $context = []): void
    {
        Log::warning($message, $context);
    }
}

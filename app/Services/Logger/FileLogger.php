<?php

namespace App\Services\Logger;

use Illuminate\Support\Facades\Log;

class FileLogger implements LoggerInterface
{
    public function info(string $message, array $context=[]): void
    {
        Log::info($message, $context = []);
    }

    public function warning(string $message): void
    {
        Log::warning($message, $context = []);
    }

    public function error(string $message): void
    {
        Log::error($message, $context = []);
    }
}

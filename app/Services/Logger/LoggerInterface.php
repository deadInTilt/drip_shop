<?php

namespace App\Services\Logger;

interface LoggerInterface
{
    public function info(string $message): void;
    public function warning(string $message): void;
    public function error(string $message): void;
}

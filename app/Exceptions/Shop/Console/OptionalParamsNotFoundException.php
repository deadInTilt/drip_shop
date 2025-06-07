<?php

namespace App\Exceptions\Shop\Console;

use App\Services\Logger\LoggerInterface;
use Exception;

class OptionalParamsNotFoundException extends ConsoleProductImportException
{
    public function __construct()
    {
        parent::__construct("Опциональный параметр не найден");
    }
}

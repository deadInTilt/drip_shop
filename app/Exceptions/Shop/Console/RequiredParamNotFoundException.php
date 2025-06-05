<?php

namespace App\Exceptions\Shop\Console;

use App\Services\Logger\LoggerInterface;
use Exception;

class RequiredParamNotFoundException extends ConsoleProductImportException
{
    public function __construct(string $dictionaryName, string $value)
    {
        parent::__construct("Обязательный параметр '{$dictionaryName}' не найден");
    }
}

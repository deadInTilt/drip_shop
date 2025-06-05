<?php

namespace App\Exceptions\Shop\Console;

use App\Services\Logger\LoggerInterface;
use Exception;

class MissingRequiredFieldException extends ConsoleProductImportException
{
    public function __construct(string $field)
    {
        parent::__construct("Отсутствует необходимое поле: {$field}");
    }
}

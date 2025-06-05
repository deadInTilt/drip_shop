<?php

namespace App\Exceptions\Shop\Console;

use App\Services\Logger\LoggerInterface;
use Exception;

class TagNotFoundException extends ConsoleProductImportException
{
    public function __construct(string $tag)
    {
        parent::__construct("Указанный тег не найден: {$tag}");
    }
}

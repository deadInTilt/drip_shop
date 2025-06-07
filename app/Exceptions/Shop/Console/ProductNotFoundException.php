<?php

namespace App\Exceptions\Shop\Console;

use App\Services\Logger\LoggerInterface;
use Exception;

class ProductNotFoundException extends ConsoleProductImportException
{
    public function __construct($productId)
    {
        parent::__construct("Товар с ID {$productId} не найден");
    }
}

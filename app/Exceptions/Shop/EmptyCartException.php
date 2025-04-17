<?php

namespace App\Exceptions\Shop;

use Exception;

class EmptyCartException extends Exception
{
    public function __construct()
    {
        parent::__construct('Корзина пуста');
    }
}

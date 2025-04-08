<?php

namespace App\Http\Controllers\Shop\Catalog;

use App\Http\Controllers\Controller;
use App\Services\Logger\LoggerInterface;
abstract class AbstractCatalogController extends Controller
{
    protected LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}

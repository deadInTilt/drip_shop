<?php

namespace App\Console\Commands;

use App\Exceptions\Shop\Console\MissingRequiredFieldException;
use App\Services\Console\ConsoleImportProductsService;
use Illuminate\Console\Command;

class ConsoleImportProducts extends Command
{
    public function __construct(protected ConsoleImportProductsService $importService)
    {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make import products from csv file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = $this->argument('path');

        if (!file_exists($filePath)) {
            $this->error('File not found: ' . $filePath);
            return Command::FAILURE;
        }

        try {
            $stats = $this->importService->startImport($filePath);

            $this->info("Импорт товаров завершен:
                Общее количество товаров в файле: {$stats['total']}
                Добавлено: {$stats['created']}
                Изменено: {$stats['updated']}
                Товаров с ошибками: {$stats['errors']}
                Товаров не найдено: {$stats['not_found']}
            ");

            return Command::SUCCESS;
        } catch (\Exception $exception) {
            $this->error($exception->getMessage());
            $this->info("Импорт товаров завершен:
                Общее количество товаров в файле: {$stats['total']}
                Добавлено: {$stats['created']}
                Изменено: {$stats['updated']}
                Товаров с ошибками: {$stats['errors']}
                Товаров не найдено: {$stats['not_found']}
            ");
            return Command::FAILURE;
        }
    }
}

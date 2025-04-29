<?php

namespace App\Http\Controllers\Admin\Product;

use App\Exceptions\Shop\Product\ProductImportException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ImportRequest;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class ImportController extends Controller
{
    public function index()
    {
        return view('admin.product.import');
    }

    public function import(ImportRequest $request)
    {
        $request->validated();

        try {
            Excel::queueImport(new ProductImport, $request->file('file'));

            return redirect()->route('admin.product.import')->with('success', 'Товары успешно загружены');
        } catch (ValidationException $e) {

            $failures = $e->failures();

            $errorMessages = collect($failures)->map(function ($failure) {
                return "Строка {$failure->row()}: " . implode(', ', $failure->errors());
            });

            return back()->withErrors($errorMessages)->withInput();
        } catch (\Throwable $e) {
            throw new ProductImportException('Ошибка при выполнении импорта товаров:', 0, $e);
        }
    }
}

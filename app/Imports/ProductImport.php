<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductImport implements ToModel, WithHeadingRow, WithValidation, ShouldQueue, WithChunkReading
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'title' => $row['title'],
            'description' => $row['description'],
            'preview_image' => $row['preview_image'],
            'quantity' => $row['quantity'],
            'price' => $row['price'],
            'brand_id' => $row['brand_id'] ?? null,
            'category_id' => $row['category_id'],
            'color_id' => $row['color_id'],
            'group_id' => $row['group_id'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            '*.title' => 'required|string|max:255',
            '*.description' => 'required|string',
            '*.preview_image' => 'string|max:255',
            '*.quantity' => 'required|integer',
            '*.price' => 'required|integer',
            '*.brand_id' => 'required|integer',
            '*.category_id' => 'required|integer',
            '*.color_id' => 'required|integer',
            '*.group_id' => 'nullable|integer',
        ];
    }

    public function validationMessages() {
        return [
            '*.title.required' => 'Название обязательно.',
            '*.description.required' => 'Название обязательно.',
            '*.price.required' => 'Название обязательно.',
            '*.price.integer' => 'Цена должна быть числом.'
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}

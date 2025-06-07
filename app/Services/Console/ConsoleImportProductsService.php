<?php

namespace App\Services\Console;

use App\Exceptions\Shop\Console\MissingRequiredFieldException;
use App\Exceptions\Shop\Console\OptionalParamsNotFoundException;
use App\Exceptions\Shop\Console\ProductNotFoundException;
use App\Exceptions\Shop\Console\RequiredParamNotFoundException;
use App\Exceptions\Shop\Console\TagNotFoundException;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Product;
use App\Models\Tag;
use App\Services\Logger\ImportLogger;
use Illuminate\Support\Facades\DB;

class ConsoleImportProductsService
{
    public function __construct(protected ImportLogger $logger)
    {
    }

    public function startImport(string $filePath): array
    {
        $rows = array_map(function ($line) {
            return str_getcsv($line, ';', '"');
        }, file($filePath));
        $header = array_shift($rows);

        $stats = [
            'total' => 0,
            'created' => 0,
            'updated' => 0,
            'errors' => 0,
            'not_found' => 0,
        ];

        foreach ($rows as $row) {
            $stats['total']++;

            $data = array_combine($header, $row);

            DB::beginTransaction();

            try {
                $this->processImport($data, $stats);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $stats['errors']++;
                $this->logger->error("При обработке товара {$stats['total']} возникла ошибка - {$e->getMessage()}");
                continue;
            }
        }
        return $stats;
    }
    public function processImport(array $data, &$stats): void
    {
        $required = ['title', 'price', 'brand', 'category'];

        foreach ($required as $field) {
            if (empty($data[$field])) {
                throw new MissingRequiredFieldException($field);
            }
        }

        $brand = Brand::where('title', $data['brand'])->first();
        $category = Category::where('title', $data['category'])->first();

        if (!$brand) {
            throw new RequiredParamNotFoundException('brand', $data['brand']);
        }
        if (!$category) {
            throw new RequiredParamNotFoundException('category', $data['category']);
        }

        $color = $data['color'] ? Color::where('title', $data['color'])->first() : null;
        $group = $data['group'] ? Group::where('title', $data['group'])->first() : null;

        if ($data['color'] && !$color || $data['group'] && !$group) {
            throw new OptionalParamsNotFoundException();
        }

        $tagIds = [];
        if (!empty($data['tags'])) {
            $tags = explode(',', $data['tags']);
            foreach ($tags as $t) {
                $tag = Tag::where('title', $t)->first();
                if (!$tag) {
                    throw new TagNotFoundException($t);
                }
                $tagIds[] = $tag->id;
            }
        }

        if (!empty($data['id'])) {
            $product = Product::find($data['id']);

            if (!$product) {
                $stats['not_found']++;
                throw new ProductNotFoundException($data['id']);
            }

            $product->update([
                'title' => $data['title'],
                'price' => $data['price'],
                'brand_id' => $brand->id,
                'category_id' => $category->id,
                'description' => $data['description'],
                'color_id' => $color->id ?? null,
                'group_id' => $group->id ?? null,
            ]);

            $stats['updated']++;
        } else {
            $product = Product::create([
                'title' => $data['title'],
                'price' => $data['price'],
                'brand_id' => $brand->id,
                'category_id' => $category->id,
                'description' => $data['description'],
                'quantity' => 0,
                'color_id' => $color->id ?? null,
                'group_id' => $group->id ?? null,
            ]);

            $stats['created']++;
        }

        if (!empty($tagIds)) {
            $product->tags()->sync($tagIds);
        } else {
            $product->tags()->detach();
        }
    }
}

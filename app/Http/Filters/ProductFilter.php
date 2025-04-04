<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const CATEGORIES = 'categories';
    public const COLORS = 'colors';
    public const PRICE = 'price';
    public const TAGS = 'tags';
    public const BRAND = 'brand_id';

    protected function getCallbacks(): array
    {
        return array(
            self::CATEGORIES => array($this, 'categories'),
            self::COLORS => array($this, 'colors'),
            self::PRICE => array($this, 'price'),
            self::TAGS => array($this, 'tags'),
            self::BRAND => array($this, 'brand'),
        );
    }

    public function categories(Builder $builder, $value)
    {
        $builder->whereIn('category_id', $value);
    }

    public function colors(Builder $builder, $value)
    {
        $builder->whereIn('color_id', $value);

    }

    public function price(Builder $builder, $value)
    {
        $builder->whereBetween($value['from'], $value['to']);

    }

    public function tags(Builder $builder, $value)
    {
        $builder->whereHas('tags', function ($b) use ($value) {
            $b->whereIn('tag_id', $value);
        });
    }

    public function brand(Builder $builder, $value)
    {
        $builder->whereIn('brand_id', $value);
    }
}

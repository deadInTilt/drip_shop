<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CatalogFilter extends AbstractFilter
{
    public const CATEGORIES = 'categories';
    public const COLORS = 'colors';
    public const PRICE = 'price';
    public const TAGS = 'tags';
    public const BRANDS = 'brands';

    protected function getCallbacks(): array
    {
        return array(
            self::CATEGORIES => array($this, 'categories'),
            self::COLORS => array($this, 'colors'),
            self::PRICE => array($this, 'price'),
            self::TAGS => array($this, 'tags'),
            self::BRANDS => array($this, 'brands'),
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
        $from = isset($value['from']) && is_numeric($value['from']) ? (float) $value['from'] : null;
        $to = isset($value['to']) && is_numeric($value['to']) ? (float) $value['to'] : null;

        if (!is_null($from) && !is_null($to)) {
            $builder->whereBetween('price', [$from, $to]);
        } elseif (!is_null($from)) {
            $builder->where('price', '>=', $from);
        } elseif (!is_null($to)) {
            $builder->where('price', '<=', $to);
        }
    }

    public function tags(Builder $builder, $value)
    {
        $builder->whereHas('tags', function ($b) use ($value) {
            $b->whereIn('tag_id', $value);
        });
    }

    public function brands(Builder $builder, $value)
    {
        $builder->whereIn('brand_id', $value);
    }
}

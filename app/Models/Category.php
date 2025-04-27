<?php

namespace App\Models;

use App\Models\Traits\HasThumbnail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasThumbnail;

    protected $table = 'categories';
    protected $guarded = false;

    public function products(): HasMany
    {
        return $this->HasMany(Product::class, 'category_id', 'id');
    }

    function thumbnailDir(): string
    {
        return 'categories';
    }
}

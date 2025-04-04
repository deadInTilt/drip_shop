<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'groups';

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'group_id', 'id');
    }
}

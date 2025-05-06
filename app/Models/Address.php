<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFullAddressAttribute()
    {
        return collect([
            $this->country,
            $this->city,
            $this->street,
            $this->house,
            $this->postcode,
        ])
            ->filter()
            ->implode(', ');
    }
}

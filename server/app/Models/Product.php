<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = false;

    use HasFactory, Filterable;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

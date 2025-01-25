<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = false;
    public $timestamps = false;

    use HasFactory;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}

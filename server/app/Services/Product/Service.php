<?php

namespace App\Services\Product;

use App\Http\Filters\ProductFilter;
use App\Http\Resources\Product\ProductCollection;
use App\Models\Product;

class Service
{
    public function index(array $data): ProductCollection
    {
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        $products = Product::filter($filter)->with('category')->paginate(10);

        return ProductCollection::make($products);
    }
}

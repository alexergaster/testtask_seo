<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\FilterRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Services\Product\Service;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    private Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index(FilterRequest $request): JsonResponse
    {
        $data = $request->validated();

        $products = $this->service->index($data);

        return response()->json(['success' => true, 'data' => $products]);
    }

    public function show(int $id): JsonResponse
    {
        $product = Product::with('category')->findOrFail($id);

        return response()->json(['success' => true, 'data' => ProductResource::make($product)]);
    }
}

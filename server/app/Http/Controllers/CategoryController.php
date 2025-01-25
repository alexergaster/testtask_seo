<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\ShwoResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = Category::all();

        return response()->json(["success" => true, "categories" => CategoryResource::collection($categories)]);
    }

    public function show(int $id): JsonResponse
    {
        $category = Category::with('products')->findOrFail($id);

        return response()->json(["success" => true, "category" => ShwoResource::make($category)]);
    }
}

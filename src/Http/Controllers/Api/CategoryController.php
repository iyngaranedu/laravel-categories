<?php


namespace Iyngaran\Category\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Iyngaran\Category\Http\Resources\CategoryCollection;
use Iyngaran\Category\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category): JsonResponse
    {
        return response()->json(new CategoryCollection($category->get()));
    }

    public function store(): JsonResponse
    {
        return response()->json(
            [],
            201
        );
    }

    public function show(): JsonResponse
    {
        return response()->json([]);
    }

    public function update(): JsonResponse
    {
        return response()->json([]);
    }

    public function destroy(): JsonResponse
    {
        return response()->json([], 204);
    }
}

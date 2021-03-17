<?php


namespace Iyngaran\Category\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Iyngaran\Category\Actions\CreateCategoryAction;
use Iyngaran\Category\Actions\UpdateCategoryAction;
use Iyngaran\Category\Http\Resources\Category as CategoryResource;
use Iyngaran\Category\Http\Resources\CategoryCollection;
use Iyngaran\Category\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category): JsonResponse
    {
        return response()->json(new CategoryCollection($category->get()));
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json(
            new CategoryResource((new CreateCategoryAction())->execute($request)),
            201
        );
    }

    public function show(Category $category): JsonResponse
    {
        return response()->json(
            new CategoryResource($category)
        );
    }

    public function update(Request $request, Category $category): JsonResponse
    {
        return response()->json(
            new CategoryResource((new UpdateCategoryAction())->execute($request, $category)),
            200
        );
    }

    public function destroy(Category $category): JsonResponse
    {
        return response()->json($category->delete(), 204);
    }
}

<?php


namespace Iyngaran\Category\Http\Controllers\Api;


use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Iyngaran\Category\Http\Resources\CategoryMinimalResource as CategoryResource;
use Iyngaran\Category\Models\Category;

class ShowCategoryController extends Controller
{
    public function __invoke(Category $category): JsonResponse
    {
        return response()->json(
            new CategoryResource($category)
        );
    }
}

<?php


namespace Iyngaran\Category\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Iyngaran\Category\Actions\CreateCategoryAction;
use Iyngaran\Category\Actions\UpdateCategoryAction;
use Iyngaran\Category\Http\Resources\CategoryResource as CategoryResource;
use Iyngaran\Category\Models\Category;

class CategoryTreeController extends Controller
{
    public function __invoke(Category $category): JsonResponse
    {
        return response()->json(CategoryResource::collection($category->get()));
    }
}

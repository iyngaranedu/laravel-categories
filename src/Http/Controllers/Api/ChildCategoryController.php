<?php


namespace Iyngaran\Category\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Iyngaran\Category\Http\Resources\CategoryMinimalResource as CategoryResource;
use Iyngaran\Category\Models\Category;

class ChildCategoryController extends Controller
{
    public function __invoke(Category $category): AnonymousResourceCollection
    {
        return CategoryResource::collection($category->childCategories);
    }
}

<?php


namespace Iyngaran\Category\Http\Controllers\PublicController;


use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Iyngaran\Category\Http\Resources\CategoryResource as CategoryResource;
use Iyngaran\Category\Models\Category;

class ChildCategoryController extends Controller
{
    public function __invoke(Category $category): AnonymousResourceCollection
    {
        return CategoryResource::collection($category->childCategories);
    }
}

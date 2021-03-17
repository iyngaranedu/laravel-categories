<?php


namespace Iyngaran\Category\Actions;

use Illuminate\Http\Request;
use Iyngaran\Category\Models\Category;

class UpdateCategoryAction
{
    public function execute(Request $request, Category $category): Category
    {
        $category->update($request->all());
        return $category;
    }
}

<?php


namespace Iyngaran\Category\Actions;

use Illuminate\Http\Request;
use Iyngaran\Category\Models\Category;

class CreateCategoryAction
{
    public function execute(Request $request): Category
    {
        return Category::create($request->all());
    }
}

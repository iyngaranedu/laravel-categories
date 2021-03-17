<?php


namespace Iyngaran\Category\Actions;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryAction
{
    public function execute(FormRequest $request)
    {
        dd($request->all());
    }
}

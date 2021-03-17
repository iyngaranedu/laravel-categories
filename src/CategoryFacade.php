<?php

namespace Iyngaran\Category;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Iyngaran\Category\Category
 */
class CategoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-categories';
    }
}

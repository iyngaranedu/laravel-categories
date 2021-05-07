<?php


namespace Iyngaran\Category\Tests\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Iyngaran\Category\Models\Category;
use Iyngaran\Category\Tests\TestCase;

class CategoryTreeControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function parent_categories_can_be_retrieve_with_child_categories()
    {
        $this->withoutExceptionHandling();
        Category::factory()->count(20)->create();
        $response = $this->getJson(route('categories.tree'));
        $response->assertStatus(200);
    }
}

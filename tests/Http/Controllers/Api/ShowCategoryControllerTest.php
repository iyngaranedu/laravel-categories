<?php


namespace Iyngaran\Category\Tests\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Iyngaran\Category\Models\Category;
use Iyngaran\Category\Tests\Models\User;
use Iyngaran\Category\Tests\TestCase;

class ShowCategoryControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;


    /** @test */
    public function a_category_can_be_retrieve_by_slug()
    {
        $this->withoutExceptionHandling();
        Category::factory()->count(20)->create();
        $category = Category::first();
        $response = $this->getJson(route('categories.show.by.slug',['category' => $category->slug]));
        $response->assertStatus(200);
        $response->assertJson([
            "id" => $category->id,
            "name" => $category->name,
            "slug" => $category->slug
        ]);
    }
}

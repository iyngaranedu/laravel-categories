<?php


namespace Iyngaran\Category\Tests\Http\Controllers\Api;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Iyngaran\Category\Models\Category;
use Iyngaran\Category\Tests\Models\User;
use Iyngaran\Category\Tests\TestCase;
use JetBrains\PhpStorm\ArrayShape;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    private function mockCategoryData(int $parentId = null): array
    {
        return [
            'name' => $this->faker->word,
            'icon' => '#'.$this->faker->word,
            'image' => $this->faker->word.".png",
            'banner' => $this->faker->word.".png",
            'small_description' => $this->faker->paragraph,
            'detail_description' => $this->faker->paragraph,
            'display_order' => $this->faker->randomNumber(3),
            'parent_id' => $parentId
        ];
    }

    /** @test */
    public function categories_can_be_retrieve()
    {
        Category::factory()->count(20)->create();
        $response = $this->getJson('api/app/categories?page=2&order-by=title&order-in=ASC');
        $response->assertStatus(200);
    }

    /** @test */
    public function a_category_can_be_retrieve()
    {
        Category::factory()->count(20)->create();

        $response = $this->getJson('api/app/categories/'.Category::first()->id);
        $response->assertStatus(200);
    }

    /** @test */
    public function a_parent_category_can_be_created()
    {
        auth()->login(User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 'password!',
        ]));

        $response = $this->postJson(
            'api/app/categories',
            $this->mockCategoryData()
        );
        $response->assertStatus(201);
    }

    /** @test */
    public function a_child_category_can_be_created()
    {
        auth()->login(User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 'password!',
        ]));

        $parentCategory = Category::factory()->create();

        $response = $this->postJson(
            'api/app/categories',
            $this->mockCategoryData($parentCategory->id)
        );
        $response->assertStatus(201);
    }


    /** @test */
    public function a_category_can_be_updated()
    {
       $category = Category::factory()->create();

        auth()->login(User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 'password!',
        ]));

        $response = $this->putJson(
            'api/app/categories/'.$category->id,
            $this->mockCategoryData()
        );
        $response->assertStatus(200);
    }

    /** @test */
    public function a_category_can_be_deleted()
    {
        $category = Category::factory()->create();

        auth()->login(User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 'password!',
        ]));

        $response = $this->deleteJson(
            'api/app/categories/'.$category->id
        );
        $response->assertStatus(204);
    }

}

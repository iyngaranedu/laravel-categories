<?php

namespace Iyngaran\Category\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Iyngaran\Category\Models\Category;


class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $category_name = $this->faker->word;
        return [
            'name' => $category_name,
            'slug' => Str::slug($category_name),
            'icon' => '#'.$this->faker->word,
            'image' => $this->faker->word.".png",
            'banner' => $this->faker->word.".png",
            'small_description' => $this->faker->paragraph,
            'detail_description' => $this->faker->paragraph,
            'display_order' => $this->faker->randomNumber(3),
            'parent_id' => null
        ];
    }
}


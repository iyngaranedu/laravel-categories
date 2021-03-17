<?php

namespace Iyngaran\Category\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Iyngaran\Category\Models\Category;


class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
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


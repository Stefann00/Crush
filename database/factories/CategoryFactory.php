<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_name=$this->faker->unique()->words($nb=2,$asText=true);
        $slug=Str::slug($category_name); // Generira link spored imeto na kategorijata, 2 zbora.
        return [
            'name'=>$category_name,
            'slug'=>$slug
        ];
    }
}

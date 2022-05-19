<?php

namespace Database\Factories;

use App\Models\CategoryPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['فروشنده4','فروشنده6 فروشنده3','فروشنده7','فروشنده9','فروشنده7']),
//            'name' => $this->faker->userName,
            'slug' => $this->faker->slug,
            'parent_id' => 1,
            'description' => $this->faker->text,
            'meta_title' => $this->faker->title,
            'meta_description' => $this->faker->title,
            'image' => $this->faker->url,
            'status' => 1,
            'category_id' => $this->faker->numberBetween(1,4),
        ];
    }
}

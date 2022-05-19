<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['فروشنده5','فروشنده4 ','فروشنده3','فروشنده2','فروشنده1']),
            'slug' => $this->faker->slug,
            'meta_title' => $this->faker->randomElement(['صثقوتصثناق','فغعفرل','بلافغ','یبلیقغقفغ','یبلیبل']),
            'image' => $this->faker->url,
            'meta_description' => $this->faker->text,
            'description' => $this->faker->text,
            'parent_id' => $this->faker->numberBetween(1,10),
            'top' => $this->faker->numberBetween(1,4),
            'sort_order' => $this->faker->numberBetween(1,4),
            'status' => $this->faker->numberBetween(1,5),
        ];
    }
}

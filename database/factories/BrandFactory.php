<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'persian_name' => $this->faker->name,
            'english_name' => $this->faker->title,
            'slug' => $this->faker->slug,
            'image' => $this->faker->url,
            'description' => $this->faker->text(200),
            'meta_title' => $this->faker->text(20),
            'meta_description' => $this->faker->text(20),
            'status' =>$this->faker->numberBetween(0,1),
        ];

    }

}

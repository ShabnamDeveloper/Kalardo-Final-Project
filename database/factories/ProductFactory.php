<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb = 4, $asText = true);
        $slug = Str::slug($product_name);
        return [
            'name'=>$this->faker->text(15),
            'user_id'=>$this->faker->numberBetween(1,10),
            'price'=>$this->faker->numberBetween(150000,99999999),
            'slug'=>$this->faker->slug,
            'meta_title'=>$this->faker->text,
            'status_id'=>$this->faker->numberBetween(1,2),
            'brand_id'=>$this->faker->numberBetween(1,2),
            'meta_description'=>$this->faker->text(15),
            'image'=>$this->faker->url,
            'short_description'=>$this->faker->text(15),
            'description'=>$this->faker->text(15),
            'inventory'=>$this->faker->numberBetween(10,99),
            ];

    }
}

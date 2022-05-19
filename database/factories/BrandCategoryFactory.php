<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\BrandCategory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BrandCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//        'category_id','brand_id','description','meta_title','meta_description','status',
        return [
            'category_id' => Category::factory(),
            'brand_id' => Brand::factory(),
            'description' => $this->faker->text(200),
            'meta_title' => $this->faker->text(20),
            'meta_description' => $this->faker->text(20),
            'status' =>$this->faker->numberBetween(0,1),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\ProductAlert;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductAlertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductAlert::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->text(15),
            'description'=>$this->faker->text(60),
            'status'=>$this->faker->numberBetween(0,1),
            'product_id'=>$this->faker->numberBetween(1,10),
        ];
    }
}

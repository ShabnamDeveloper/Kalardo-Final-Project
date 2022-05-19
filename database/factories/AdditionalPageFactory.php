<?php

namespace Database\Factories;

use App\Models\AdditionalPage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class AdditionalPageFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdditionalPage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title,
            'slug' => $this->faker->slug,
            'status' =>$this->faker->numberBetween(0,1),
            'meta_title' => $this->faker->text(20),
            'meta_description' => $this->faker->text(20),
            'description' => $this->faker->text(20),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city_id' => $this->faker->numberBetween(1, 3),
            'user_id' => $this->faker->randomElement(\App\Models\User::pluck('id')->toArray()),
            'state_id' => $this->faker->numberBetween(1, 3),
            'approved' => $this->faker->numberBetween(0, 2),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'postcode' => $this->faker->randomNumber(5),
        ];
    }
}

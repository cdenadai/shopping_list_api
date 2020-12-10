<?php

namespace App\BusinessRules\Region\Models;

use App\BusinessRules\Region\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RegionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Region::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->name,
            'location' => 'POINT(10, 10)'
        ];
    }
}

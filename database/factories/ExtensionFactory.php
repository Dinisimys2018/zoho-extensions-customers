<?php

namespace Database\Factories;

use App\Models\Extension;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExtensionFactory extends Factory
{
    protected $model = Extension::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'api_prefix' => $this->faker->unique()->safeEmail(),
        ];
    }
}

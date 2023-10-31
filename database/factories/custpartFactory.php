<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\custpart>
 */
class custpartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
               
            'company_name' => $this->faker->company,
            'type' => $this->faker->randomElement(['customer', 'partnership']),
            'image' => 'co-images/' . $this->faker->randomElement(['dalang.jpeg', 'radiohead.jpeg', 'roblox.jpg']),
        ];
       
    }
}

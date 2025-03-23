<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CardContent>
 */
class CardContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->company(), // Generates a company name
            'description' => $this->faker->paragraph(3), // Generates a description
            'image' => $this->faker->imageUrl(640, 480, 'business', true, 'Faker'), // Random business image
            'location' => $this->faker->city(), // Generates a random city
            'address' => $this->faker->address(), // Generates a full address
            'phone_no' => $this->faker->phoneNumber(), // Generates a random phone number
        ];
    }
}

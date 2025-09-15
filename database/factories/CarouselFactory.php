<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carousel>
 */
class CarouselFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'image' => 'carousel/default.jpg',
            'image_480' => null,
            'image_768' => null,
            'image_1024' => null,
            'is_active' => true,
            'order' => fake()->numberBetween(1, 100),
            'link' => fake()->optional()->url(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titleInd = $this->faker->sentence(4);
        $titleEng = $this->faker->sentence(4);

        return [
            'slug_ind' => $this->faker->unique()->slug(),
            'slug_eng' => $this->faker->unique()->slug(),
            'title_ind' => $titleInd,
            'title_eng' => $titleEng,
            'publish_date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'content_ind' => $this->faker->paragraphs(3, true),
            'content_eng' => $this->faker->paragraphs(3, true),
            'category' => $this->faker->randomElement(['blog', 'news', 'press release']),
            'image' => 'storage/news/default-news.jpg',
            'is_active' => $this->faker->boolean(80), // 80% chance of being active
        ];
    }
}

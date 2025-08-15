<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example data for the carousels
        $carousels = [
            [
                'title' => 'Steffi',
                // 'image' => 'assets/img/carousel/steffi-cover.jpg',
                'image' => 'assets/img/carousel/steffi-cover.webp',
                'active' => true,
                'order' => 1,
                'link' => '#steffi',
            ],
            [
                'title' => 'British Propolis Reguler',
                // 'image' => 'assets/img/carousel/british-propolis-reguler-cover.jpg',
                'image' => 'assets/img/carousel/british-propolis-reguler-cover.webp',
                'active' => true,
                'order' => 2,
                'link' => '#british-propolis-reguler',
            ],
            [
                'title' => 'British Propolis Green (Kids)',
                // 'image' => 'assets/img/carousel/british-propolis-green-kids-cover.jpg',
                'image' => 'assets/img/carousel/british-propolis-green-kids-cover.webp',
                'active' => true,
                'order' => 3,
                'link' => '#british-propolis-green-kids',
            ],
            [
                'title' => 'British Propolis Norway',
                // 'image' => 'assets/img/carousel/british-propolis-norway-cover.jpg',
                'image' => 'assets/img/carousel/british-propolis-norway-cover.webp',
                'active' => true,
                'order' => 4,
                'link' => '#british-propolis-norway',
            ],
            [
                'title' => 'Belgie – Perawatan Kulit Premium',
                // 'image' => 'assets/img/carousel/belgie-perawatan-kulit-premium-cover.jpg',
                'image' => 'assets/img/carousel/belgie-perawatan-kulit-premium-cover.webp',
                'active' => true,
                'order' => 5,
                'link' => '#belgie-perawatan-kulit-premium',
            ],
        ];

        foreach ($carousels as $carousel) {
            \App\Models\Carousel::create($carousel);
        }
    }
}

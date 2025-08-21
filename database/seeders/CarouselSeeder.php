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
                'title' => 'Carousel 1',
                'image' => 'assets/img/carousel/carousel1.webp',
                'image_480' => 'assets/img/carousel/carousel1-480.webp',
                'image_768' => 'assets/img/carousel/carousel1-768.webp',
                'image_1024' => 'assets/img/carousel/carousel1-1024.webp',
                'active' => true,
                'order' => 1,
                'link' => '#',
            ],
            [
                'title' => 'Carousel 2',
                'image' => 'assets/img/carousel/carousel2.webp',
                'image_480' => 'assets/img/carousel/carousel2-480.webp',
                'image_768' => 'assets/img/carousel/carousel2-768.webp',
                'image_1024' => 'assets/img/carousel/carousel2-1024.webp',
                'active' => true,
                'order' => 2,
                'link' => '#',
            ],
            [
                'title' => 'Carousel 3',
                'image' => 'assets/img/carousel/carousel3.webp',
                'image_480' => 'assets/img/carousel/carousel3-480.webp',
                'image_768' => 'assets/img/carousel/carousel3-768.webp',
                'image_1024' => 'assets/img/carousel/carousel3-1024.webp',
                'active' => true,
                'order' => 3,
                'link' => '#',
            ],
            [
                'title' => 'Carousel 4',
                'image' => 'assets/img/carousel/carousel4.webp',
                'image_480' => 'assets/img/carousel/carousel4-480.webp',
                'image_768' => 'assets/img/carousel/carousel4-768.webp',
                'image_1024' => 'assets/img/carousel/carousel4-1024.webp',
                'active' => true,
                'order' => 4,
                'link' => '#',
            ],
            [
                'title' => 'Carousel 5',
                'image' => 'assets/img/carousel/carousel5.webp',
                'image_480' => 'assets/img/carousel/carousel5-480.webp',
                'image_768' => 'assets/img/carousel/carousel5-768.webp',
                'image_1024' => 'assets/img/carousel/carousel5-1024.webp',
                'active' => true,
                'order' => 5,
                'link' => '#',
            ],
        ];

        foreach ($carousels as $carousel) {
            \App\Models\Carousel::create($carousel);
        }
    }
}

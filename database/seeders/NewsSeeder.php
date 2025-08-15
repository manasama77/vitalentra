<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'slug_ind' => Str::slug('Manis Tanpa Rasa Bersalah: Mengapa Stevia Lebih Sehat dari Gula Biasa'),
                'slug_eng' => Str::slug('Guilt-Free Sweetness: Why Stevia is Healthier than Regular Sugar'),
                'title_ind' => 'Manis Tanpa Rasa Bersalah: Mengapa Stevia Lebih Sehat dari Gula Biasa',
                'title_eng' => 'Guilt-Free Sweetness: Why Stevia is Healthier than Regular Sugar',
                'publish_date' => '2025-08-15',
                'category' => 'blog',
                'image' => 'assets/img/thumbnail/manis-tanpa-rasa-bersalah-mengapa-stevia-lebih-sehat-dari-gula-biasa.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'content_ind' => view('article1_ind')->render(),
                'content_eng' => view('article1_eng')->render(),
            ],
            [
                'slug_ind' => Str::slug('Tips & Trik Konsumsi Steffi: Cara Manis Tanpa Gula di Minuman dan Makanan Favoritmu'),
                'slug_eng' => Str::slug('Tips & Tricks for Consuming Steffi: Sweetness Without Sugar in Your Favorite Drinks and Foods'),
                'title_ind' => 'Tips & Trik Konsumsi Steffi: Cara Manis Tanpa Gula di Minuman dan Makanan Favoritmu',
                'title_eng' => 'Tips & Tricks for Consuming Steffi: Sweetness Without Sugar in Your Favorite Drinks and Foods',
                'publish_date' => '2025-08-16',
                'category' => 'blog',
                'image' => 'assets/img/thumbnail/tips-and-trik-konsumsi-steffi-cara-manis-tanpa-gula-di-minuman-dan-makanan-favoritmu.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'content_ind' => view('article2_ind')->render(),
                'content_eng' => view('article2_eng')->render(),
            ],
            [
                'slug_ind' => Str::slug('Gula Berlebih: Manisnya Sekarang, Risikonya Nanti'),
                'slug_eng' => Str::slug('Excess Sugar: Sweet Now, Risky Later'),
                'title_ind' => 'Gula Berlebih: Manisnya Sekarang, Risikonya Nanti',
                'title_eng' => 'Excess Sugar: Sweet Now, Risky Later',
                'publish_date' => '2025-08-17',
                'category' => 'blog',
                'image' => 'assets/img/thumbnail/gula-berlebih-manisnya-sekarang-risikonya-nanti.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'content_ind' => view('article3_ind')->render(),
                'content_eng' => view('article3_eng')->render(),
            ],
        ];

        News::insert($data);
    }
}

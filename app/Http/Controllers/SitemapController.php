<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class SitemapController extends Controller
{
    public function index(): Response
    {
        // Cache sitemap for 1 hour to improve performance
        return cache()->remember('sitemap_xml', now()->addHour(), function () {
            $urls = collect([
                [
                    'url' => route('home'),
                    'lastmod' => now()->format('Y-m-d'),
                    'changefreq' => 'weekly',
                    'priority' => '1.0',
                ],
                [
                    'url' => route('news.list'),
                    'lastmod' => now()->format('Y-m-d'),
                    'changefreq' => 'daily',
                    'priority' => '0.8',
                ],
            ]);

            // Add language switching routes
            try {
                $urls->push([
                    'url' => route('language.switch', ['locale' => 'en']),
                    'lastmod' => now()->format('Y-m-d'),
                    'changefreq' => 'yearly',
                    'priority' => '0.3',
                ]);

                $urls->push([
                    'url' => route('language.switch', ['locale' => 'id']),
                    'lastmod' => now()->format('Y-m-d'),
                    'changefreq' => 'yearly',
                    'priority' => '0.3',
                ]);
            } catch (\Exception $e) {
                // Language routes might not exist
            }

            // Add news articles if News model exists and has published articles
            if (class_exists(News::class)) {
                try {
                    $news = News::where('is_active', true)
                        ->whereNotNull('publish_date')
                        ->where('publish_date', '<=', now())
                        ->orderBy('publish_date', 'desc')
                        ->get();

                    foreach ($news as $article) {
                        // Add English version if slug exists
                        if ($article->slug_eng) {
                            $urls->push([
                                'url' => route('news.show', $article->slug_eng),
                                'lastmod' => $article->updated_at->format('Y-m-d'),
                                'changefreq' => 'monthly',
                                'priority' => '0.7',
                            ]);
                        }

                        // Add Indonesian version if slug exists and is different
                        if ($article->slug_ind && $article->slug_ind !== $article->slug_eng) {
                            $urls->push([
                                'url' => route('news.show', $article->slug_ind),
                                'lastmod' => $article->updated_at->format('Y-m-d'),
                                'changefreq' => 'monthly',
                                'priority' => '0.7',
                            ]);
                        }
                    }
                } catch (\Exception $e) {
                    // Handle if News model doesn't have expected columns or route doesn't exist
                    Log::warning('Sitemap: Error fetching news articles', ['error' => $e->getMessage()]);
                }
            }

            $xml = view('sitemap.xml', compact('urls'))->render();

            return response($xml, 200)
                ->header('Content-Type', 'application/xml')
                ->header('Cache-Control', 'public, max-age=3600'); // Cache for 1 hour
        });
    }

    /**
     * Clear sitemap cache (useful for when new content is published)
     */
    public function clearCache(): void
    {
        cache()->forget('sitemap_xml');
    }
}

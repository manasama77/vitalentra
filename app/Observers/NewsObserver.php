<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Facades\Cache;

class NewsObserver
{
    /**
     * Handle the News "created" event.
     */
    public function created(News $news): void
    {
        $this->clearSitemapCache();
    }

    /**
     * Handle the News "updated" event.
     */
    public function updated(News $news): void
    {
        $this->clearSitemapCache();
    }

    /**
     * Handle the News "deleted" event.
     */
    public function deleted(News $news): void
    {
        $this->clearSitemapCache();
    }

    /**
     * Clear sitemap cache to force regeneration
     */
    private function clearSitemapCache(): void
    {
        Cache::forget('sitemap_xml');
    }
}

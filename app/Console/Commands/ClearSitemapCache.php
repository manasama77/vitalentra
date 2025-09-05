<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearSitemapCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear the sitemap cache to force regeneration on next request';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        cache()->forget('sitemap_xml');

        $this->info('✅ Sitemap cache cleared successfully!');
        $this->line('🔄 Sitemap will be regenerated on next request to /sitemap.xml');

        return 0;
    }
}

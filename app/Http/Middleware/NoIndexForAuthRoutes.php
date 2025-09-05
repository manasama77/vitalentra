<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoIndexForAuthRoutes
{
    /**
     * Handle an incoming request.
     * Adds noindex, nofollow meta tags to authenticated routes to prevent search engine indexing
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only add headers to HTML responses
        if ($response instanceof \Illuminate\Http\Response &&
            str_contains($response->headers->get('content-type', ''), 'text/html')) {
            // Add X-Robots-Tag header to prevent indexing
            $response->headers->set('X-Robots-Tag', 'noindex, nofollow, noarchive, nosnippet, noimageindex');

            // Also add the meta tag to the HTML content if possible
            $content = $response->getContent();
            if (str_contains($content, '<head>')) {
                $metaTag = '<meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noimageindex">';
                $content = str_replace('<head>', "<head>\n    $metaTag", $content);
                $response->setContent($content);
            }
        }

        return $response;
    }
}

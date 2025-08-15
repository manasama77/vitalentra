<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\News;

class BerandaController extends Controller
{
    public function index()
    {
        $carousels = Carousel::activeCarousels();

        $news = News::where('is_active', true)
            ->orderBy('publish_date', 'desc')
            ->take(3)
            ->get();

        return view('beranda', [
            'carousels' => $carousels,
            'news' => $news,
        ]);
    }

    public function news_list()
    {
        $news = News::where('is_active', true)
            ->orderBy('publish_date', 'desc')
            ->paginate(6);

        return view('news_list', [
            'news' => $news,
        ]);
    }

    public function show($slug)
    {
        $news = News::whereAny([
            'slug_ind',
            'slug_eng',
        ], '=', $slug)
        ->firstOrFail();

        $relatedNews = News::where('is_active', true)
            ->where('id', '!=', $news->id)
            ->when($news->category, function ($query, $category) {
                return $query->where('category', $category);
            })
            ->orderBy('publish_date', 'desc')
            ->take(3)
            ->get();

        return view('news', compact('news', 'relatedNews'));
    }
}

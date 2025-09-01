<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $totalCarousels = Carousel::count();
            $totalNews = News::count();
            $activeCarousels = Carousel::where('active', true)->count();
            $activeNews = News::where('is_active', true)->count();
        } catch (\Exception $e) {
            // Handle case when tables don't exist or are empty
            $totalCarousels = 0;
            $totalNews = 0;
            $activeCarousels = 0;
            $activeNews = 0;
        }
        
        return view('dashboard', compact(
            'totalCarousels',
            'totalNews', 
            'activeCarousels',
            'activeNews'
        ));
    }
}

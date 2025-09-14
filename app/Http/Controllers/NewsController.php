<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();

        // Apply filters
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('title_ind', 'like', "%{$keyword}%")
                  ->orWhere('title_eng', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('publish_date')) {
            $query->whereDate('publish_date', $request->publish_date);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('is_active', (bool) $request->status);
        }

        $news = $query->orderBy('publish_date', 'desc')->paginate(10)->withQueryString();

        return view('backend.news.index', [
            'news' => $news,
            'filters' => $request->only(['keyword', 'publish_date', 'category', 'status']),
        ]);
    }

    public function create()
    {
        return view('backend.news.form', [
            'news' => new News(),
            'isEdit' => false,
        ]);
    }

    public function store(NewsRequest $request)
    {
        // Prevent duplicate submissions
        $cacheKey = 'news_creation_' . auth()->id() . '_' . md5($request->input('title_eng'));
        if (cache()->has($cacheKey)) {
            return redirect()->route('berita.index')
                ->with('error', 'Duplicate submission detected. News already created.');
        }

        // Set cache for 1 minute to prevent duplicates
        cache()->put($cacheKey, true, 60);

        try {
            $data = $request->validated();

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '_' . Str::slug($request->title_eng) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('news', $filename, 'public');
                $data['image'] = 'storage/' . $path;
            }

            // Ensure is_active is set
            $data['is_active'] = $request->has('is_active') ? true : false;

            News::create($data);

            return redirect()->route('berita.index')
                ->with('success', 'News created successfully.');
        } catch (\Exception $e) {
            // Clear cache on error
            cache()->forget($cacheKey);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create news: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('backend.news.form', [
            'news' => $news,
            'isEdit' => true,
        ]);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);

        // Get related news in the same category
        $relatedNews = News::where('category', $news->category)
            ->where('id', '!=', $news->id)
            ->where('is_active', true)
            ->orderBy('publish_date', 'desc')
            ->take(3)
            ->get();

        return view('backend.news.show', [
            'news' => $news,
            'relatedNews' => $relatedNews,
        ]);
    }

    public function update(NewsRequest $request, $id)
    {
        try {
            $news = News::findOrFail($id);
            $data = $request->validated();

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($news->image && Storage::disk('public')->exists(str_replace('storage/', '', $news->image))) {
                    Storage::disk('public')->delete(str_replace('storage/', '', $news->image));
                }

                $image = $request->file('image');
                $filename = time() . '_' . Str::slug($request->title_eng) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('news', $filename, 'public');
                $data['image'] = 'storage/' . $path;
            }

            // Ensure is_active is set
            $data['is_active'] = $request->has('is_active') ? true : false;

            $news->update($data);

            return redirect()->route('berita.index')
                ->with('success', 'News updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update news: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $news = News::findOrFail($id);

            // Delete image if exists
            if ($news->image && Storage::disk('public')->exists(str_replace('storage/', '', $news->image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $news->image));
            }

            $news->delete();

            return redirect()->route('berita.index')
                ->with('success', 'News deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete news: ' . $e->getMessage());
        }
    }
}

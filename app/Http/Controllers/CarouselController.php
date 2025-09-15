<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarouselRequest;
use App\Models\Carousel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Carousel::query();

        // Initialize filters array
        $filters = [];

        // Apply keyword filter
        if (request('keyword')) {
            $keyword = request('keyword');
            $query->where('title', 'like', "%{$keyword}%");
            $filters['keyword'] = $keyword;
        }

        // Apply status filter
        if (request()->has('status') && request('status') !== '') {
            $status = request('status');
            $query->where('is_active', $status);
            $filters['status'] = $status;
        }

        // Order by the order column and paginate
        $carousels = $query->orderBy('order')->paginate(10)->withQueryString();

        return view('backend.carousel.index', compact('carousels', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.carousel.form', [
            'carousel' => new Carousel(),
            'isEdit' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarouselRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->only(['title', 'link', 'is_active']);

            // Ensure is_active is properly cast to integer
            $data['is_active'] = (int) $request->input('is_active', 0);

            // Set the order for new carousel
            $maxOrder = Carousel::max('order') ?? 0;
            $data['order'] = $maxOrder + 1;

            // Handle image upload
            if ($request->hasFile('image')) {
                $imageData = $this->handleImageUpload($request->file('image'));
                $data = array_merge($data, $imageData);
            }

            // Create the carousel
            Carousel::create($data);

            DB::commit();

            return redirect()->route('carousel.index')->with('success', 'Carousel berhasil dibuat.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Clean up uploaded files if any error occurs
            if (isset($imageData)) {
                $this->cleanupImageFiles($imageData);
            }

            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuat carousel: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Handle image upload and create multiple sizes.
     */
    private function handleImageUpload($file)
    {
        // Create image manager with GD driver
        $manager = new ImageManager(new Driver());

        // Generate unique filename
        $filename = time() . '_' . uniqid();
        $extension = $file->getClientOriginalExtension();

        // Read the uploaded image
        $image = $manager->read($file->getPathname());

        $imagePaths = [];

        // Save original image
        $originalPath = "carousel/{$filename}.{$extension}";
        Storage::disk('public')->put($originalPath, $image->encode());
        $imagePaths['image'] = "storage/{$originalPath}";

        // Create and save resized versions
        $sizes = [
            '480' => 480,
            '768' => 768,
            '1024' => 1024,
        ];

        foreach ($sizes as $suffix => $width) {
            // Clone the original image and resize
            $resizedImage = clone $image;
            $resizedImage->resize($width, null);

            $resizedPath = "carousel/{$filename}_{$suffix}.{$extension}";
            Storage::disk('public')->put($resizedPath, $resizedImage->encode());
            $imagePaths["image_{$suffix}"] = "storage/{$resizedPath}";
        }

        return $imagePaths;
    }

    /**
     * Clean up image files in case of error.
     */
    private function cleanupImageFiles($imageData)
    {
        foreach ($imageData as $path) {
            if ($path && Storage::disk('public')->exists(str_replace('storage/', '', $path))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $path));
            }
        }
    }

    /**
     * Delete carousel images from storage.
     */
    private function deleteCarouselImages(Carousel $carousel)
    {
        $imageFields = ['image', 'image_480', 'image_768', 'image_1024'];

        foreach ($imageFields as $field) {
            if ($carousel->$field) {
                $path = str_replace('storage/', '', $carousel->$field);
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Carousel $carousel)
    {
        return view('backend.carousel.show', compact('carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carousel $carousel)
    {
        return view('backend.carousel.form', [
            'carousel' => $carousel,
            'isEdit' => true,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarouselRequest $request, Carousel $carousel)
    {
        DB::beginTransaction();

        try {
            $data = $request->only(['title', 'link', 'is_active']);

            // Ensure is_active is properly cast to integer
            $data['is_active'] = (int) $request->input('is_active', 0);

            // Handle image upload if provided
            if ($request->hasFile('image')) {
                // Delete old images
                $this->deleteCarouselImages($carousel);

                $imagePaths = $this->handleImageUpload($request->file('image'));
                $data = array_merge($data, $imagePaths);
            }

            $carousel->update($data);

            DB::commit();

            return redirect()->route('carousel.index')
                ->with('success', 'Carousel berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors(['error' => 'Terjadi kesalahan saat memperbarui carousel: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carousel $carousel)
    {
        DB::beginTransaction();

        try {
            // Delete associated images
            $this->deleteCarouselImages($carousel);

            // Delete the carousel record
            $carousel->delete();

            DB::commit();

            return redirect()->route('carousel.index')
                ->with('success', 'Carousel berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->withErrors(['error' => 'Terjadi kesalahan saat menghapus carousel: ' . $e->getMessage()]);
        }
    }

    /**
     * Move carousel up in order.
     */
    public function up(Carousel $carousel)
    {
        DB::beginTransaction();

        try {
            $prevCarousel = Carousel::where('order', '<', $carousel->order)
                ->orderBy('order', 'desc')
                ->first();

            if ($prevCarousel) {
                // Store the original orders
                $currentOrder = $carousel->order;
                $prevOrder = $prevCarousel->order;

                // Temporarily set to a unique value to avoid constraint violations
                $tempOrder = Carousel::max('order') + 1;

                $carousel->update(['order' => $tempOrder]);
                $prevCarousel->update(['order' => $currentOrder]);
                $carousel->update(['order' => $prevOrder]);
            }

            DB::commit();

            return redirect()->route('carousel.index')
                ->with('success', 'Urutan carousel berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('carousel.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui urutan: ' . $e->getMessage());
        }
    }    /**
     * Move carousel down in order.
     */
    public function down(Carousel $carousel)
    {
        DB::beginTransaction();

        try {
            $nextCarousel = Carousel::where('order', '>', $carousel->order)
                ->orderBy('order', 'asc')
                ->first();

            if ($nextCarousel) {
                // Store the original orders
                $currentOrder = $carousel->order;
                $nextOrder = $nextCarousel->order;

                // Temporarily set to a unique value to avoid constraint violations
                $tempOrder = Carousel::max('order') + 1;

                $carousel->update(['order' => $tempOrder]);
                $nextCarousel->update(['order' => $currentOrder]);
                $carousel->update(['order' => $nextOrder]);
            }

            DB::commit();

            return redirect()->route('carousel.index')
                ->with('success', 'Urutan carousel berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('carousel.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui urutan: ' . $e->getMessage());
        }
    }
}

<?php

declare(strict_types=1);

use App\Models\Carousel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

describe('Carousel Management', function () {
    describe('Store Operations', function () {
        test('creates carousel with image and proper resizing', function () {
            $user = User::factory()->create();

            // Create a fake image file
            Storage::fake('public');
            $file = UploadedFile::fake()->image('carousel.jpg', 1200, 600);

            $data = [
                'title' => 'Test Carousel',
                'link' => 'https://example.com',
                'is_active' => 1,
                'image' => $file,
            ];

            $response = $this->actingAs($user)
                ->post(route('carousel.store'), $data);

            $response->assertRedirect(route('carousel.index'))
                ->assertSessionHas('success', 'Carousel berhasil dibuat.');

            // Check that carousel was created in database
            $carousel = Carousel::where('title', 'Test Carousel')->first();
            expect($carousel)->not->toBeNull();
            expect($carousel->title)->toBe('Test Carousel');
            expect($carousel->link)->toBe('https://example.com');
            expect($carousel->is_active)->toBe(1);
            expect($carousel->order)->toBe(1);

            // Check that images were created
            expect($carousel->image)->not->toBeNull();
            expect($carousel->image_480)->not->toBeNull();
            expect($carousel->image_768)->not->toBeNull();
            expect($carousel->image_1024)->not->toBeNull();

            // Check that image files exist in storage
            $originalPath = str_replace('storage/', '', $carousel->image);
            $path480 = str_replace('storage/', '', $carousel->image_480);
            $path768 = str_replace('storage/', '', $carousel->image_768);
            $path1024 = str_replace('storage/', '', $carousel->image_1024);

            expect(Storage::disk('public')->exists($originalPath))->toBeTrue();
            expect(Storage::disk('public')->exists($path480))->toBeTrue();
            expect(Storage::disk('public')->exists($path768))->toBeTrue();
            expect(Storage::disk('public')->exists($path1024))->toBeTrue();
        });

        test('sets correct order for new carousels', function () {
            $user = User::factory()->create();
            Storage::fake('public');

            // Create first carousel
            $file1 = UploadedFile::fake()->image('carousel1.jpg', 1200, 600);
            $data1 = [
                'title' => 'First Carousel',
                'is_active' => 1,
                'image' => $file1,
            ];

            $this->actingAs($user)->post(route('carousel.store'), $data1);

            // Create second carousel
            $file2 = UploadedFile::fake()->image('carousel2.jpg', 1200, 600);
            $data2 = [
                'title' => 'Second Carousel',
                'is_active' => 1,
                'image' => $file2,
            ];

            $this->actingAs($user)->post(route('carousel.store'), $data2);

            $firstCarousel = Carousel::where('title', 'First Carousel')->first();
            $secondCarousel = Carousel::where('title', 'Second Carousel')->first();

            expect($firstCarousel->order)->toBe(1);
            expect($secondCarousel->order)->toBe(2);
        });

        test('validation fails with missing required fields', function () {
            $user = User::factory()->create();

            $data = [
                // Missing title (required)
            ];

            $response = $this->actingAs($user)
                ->post(route('carousel.store'), $data);

            $response->assertSessionHasErrors(['title']);
        });

        test('validation fails with invalid image', function () {
            $user = User::factory()->create();

            // Create a fake text file instead of image
            Storage::fake('public');
            $file = UploadedFile::fake()->create('document.txt', 1000);

            $data = [
                'title' => 'Test Carousel',
                'link' => 'https://example.com',
                'is_active' => 1,
                'image' => $file,
            ];

            $response = $this->actingAs($user)
                ->post(route('carousel.store'), $data);

            $response->assertSessionHasErrors(['image']);
        });
    });

    describe('Order Management', function () {
        test('up swaps order correctly', function () {
            // Create a user for authentication
            $user = User::factory()->create();

            // Create carousels with specific orders
            $carousel1 = Carousel::factory()->create(['order' => 1, 'title' => 'First']);
            $carousel2 = Carousel::factory()->create(['order' => 2, 'title' => 'Second']);
            $carousel3 = Carousel::factory()->create(['order' => 3, 'title' => 'Third']);

            // Move second carousel up (should swap with first)
            $response = $this->actingAs($user)
                ->get(route('carousel.up', $carousel2));

            $response->assertRedirect(route('carousel.index'))
                ->assertSessionHas('success', 'Urutan carousel berhasil diperbarui.');

            // Refresh models
            $carousel1->refresh();
            $carousel2->refresh();
            $carousel3->refresh();

            // Check orders were swapped
            expect($carousel1->order)->toBe(2);
            expect($carousel2->order)->toBe(1);
            expect($carousel3->order)->toBe(3); // unchanged
        });

        test('down swaps order correctly', function () {
            // Create a user for authentication
            $user = User::factory()->create();

            // Create carousels with specific orders
            $carousel1 = Carousel::factory()->create(['order' => 1, 'title' => 'First']);
            $carousel2 = Carousel::factory()->create(['order' => 2, 'title' => 'Second']);
            $carousel3 = Carousel::factory()->create(['order' => 3, 'title' => 'Third']);

            // Move second carousel down (should swap with third)
            $response = $this->actingAs($user)
                ->get(route('carousel.down', $carousel2));

            $response->assertRedirect(route('carousel.index'))
                ->assertSessionHas('success', 'Urutan carousel berhasil diperbarui.');

            // Refresh models
            $carousel1->refresh();
            $carousel2->refresh();
            $carousel3->refresh();

            // Check orders were swapped
            expect($carousel1->order)->toBe(1); // unchanged
            expect($carousel2->order)->toBe(3);
            expect($carousel3->order)->toBe(2);
        });

        test('up does nothing when already at top', function () {
            // Create a user for authentication
            $user = User::factory()->create();

            // Create carousels with specific orders
            $carousel1 = Carousel::factory()->create(['order' => 1, 'title' => 'First']);
            $carousel2 = Carousel::factory()->create(['order' => 2, 'title' => 'Second']);

            // Try to move first carousel up (should not change anything)
            $response = $this->actingAs($user)
                ->get(route('carousel.up', $carousel1));

            $response->assertRedirect(route('carousel.index'))
                ->assertSessionHas('success', 'Urutan carousel berhasil diperbarui.');

            // Refresh models
            $carousel1->refresh();
            $carousel2->refresh();

            // Check orders remain unchanged
            expect($carousel1->order)->toBe(1);
            expect($carousel2->order)->toBe(2);
        });

        test('down does nothing when already at bottom', function () {
            // Create a user for authentication
            $user = User::factory()->create();

            // Create carousels with specific orders
            $carousel1 = Carousel::factory()->create(['order' => 1, 'title' => 'First']);
            $carousel2 = Carousel::factory()->create(['order' => 2, 'title' => 'Second']);

            // Try to move second carousel down (should not change anything)
            $response = $this->actingAs($user)
                ->get(route('carousel.down', $carousel2));

            $response->assertRedirect(route('carousel.index'))
                ->assertSessionHas('success', 'Urutan carousel berhasil diperbarui.');

            // Refresh models
            $carousel1->refresh();
            $carousel2->refresh();

            // Check orders remain unchanged
            expect($carousel1->order)->toBe(1);
            expect($carousel2->order)->toBe(2);
        });
    });

    describe('Update Operations', function () {
        test('updates carousel without changing image', function () {
            $user = User::factory()->create();
            $carousel = Carousel::factory()->create([
                'title' => 'Original Title',
                'is_active' => 1,
            ]);

            $data = [
                'title' => 'Updated Title',
                'is_active' => 0,
            ];

            $response = $this->actingAs($user)
                ->put(route('carousel.update', $carousel), $data);

            $response->assertRedirect(route('carousel.index'))
                ->assertSessionHas('success', 'Carousel berhasil diperbarui!');

            $carousel->refresh();
            expect($carousel->title)->toBe('Updated Title');
            expect($carousel->is_active)->toBe(0);
        });

        test('updates carousel with new image', function () {
            $user = User::factory()->create();
            Storage::fake('public');

            $carousel = Carousel::factory()->create([
                'title' => 'Original Title',
                'image' => 'storage/carousel/old_image.jpg',
                'image_480' => 'storage/carousel/old_image_480.jpg',
                'image_768' => 'storage/carousel/old_image_768.jpg',
                'image_1024' => 'storage/carousel/old_image_1024.jpg',
            ]);

            $newFile = UploadedFile::fake()->image('new_carousel.jpg', 1200, 600);

            $data = [
                'title' => 'Updated Title',
                'is_active' => 1,
                'image' => $newFile,
            ];

            $response = $this->actingAs($user)
                ->put(route('carousel.update', $carousel), $data);

            $response->assertRedirect(route('carousel.index'))
                ->assertSessionHas('success', 'Carousel berhasil diperbarui!');

            $carousel->refresh();
            expect($carousel->title)->toBe('Updated Title');
            expect($carousel->image)->not->toBe('storage/carousel/old_image.jpg');
            expect($carousel->image)->not->toBeNull();
        });
    });

    describe('Delete Operations', function () {
        test('deletes carousel and associated images', function () {
            $user = User::factory()->create();
            Storage::fake('public');

            $carousel = Carousel::factory()->create([
                'image' => 'storage/carousel/test_image.jpg',
                'image_480' => 'storage/carousel/test_image_480.jpg',
                'image_768' => 'storage/carousel/test_image_768.jpg',
                'image_1024' => 'storage/carousel/test_image_1024.jpg',
            ]);

            // Create fake image files
            Storage::disk('public')->put('carousel/test_image.jpg', 'fake content');
            Storage::disk('public')->put('carousel/test_image_480.jpg', 'fake content');
            Storage::disk('public')->put('carousel/test_image_768.jpg', 'fake content');
            Storage::disk('public')->put('carousel/test_image_1024.jpg', 'fake content');

            $response = $this->actingAs($user)
                ->delete(route('carousel.destroy', $carousel));

            $response->assertRedirect(route('carousel.index'))
                ->assertSessionHas('success', 'Carousel berhasil dihapus!');

            // Check carousel was deleted from database
            expect(Carousel::find($carousel->id))->toBeNull();

            // Check image files were deleted from storage
            expect(Storage::disk('public')->exists('carousel/test_image.jpg'))->toBeFalse();
            expect(Storage::disk('public')->exists('carousel/test_image_480.jpg'))->toBeFalse();
            expect(Storage::disk('public')->exists('carousel/test_image_768.jpg'))->toBeFalse();
            expect(Storage::disk('public')->exists('carousel/test_image_1024.jpg'))->toBeFalse();
        });
    });
});

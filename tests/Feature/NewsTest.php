<?php

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Create a test user for authentication
    $this->user = User::factory()->create();
    Storage::fake('public');
});

describe('News CRUD Operations', function () {
    test('authenticated user can view news index page', function () {
        $news = News::factory()->count(3)->create();

        $response = $this
            ->actingAs($this->user)
            ->get(route('news.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.news.index');
        $response->assertViewHas('news');
        $response->assertSee($news->first()->title_eng);
    });

    test('unauthenticated user cannot access news index', function () {
        $response = $this->get(route('news.index'));
        $response->assertRedirect(route('login'));
    });

    test('authenticated user can view create news page', function () {
        $response = $this
            ->actingAs($this->user)
            ->get(route('news.create'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.news.form');
        $response->assertViewHas('isEdit', false);
    });

    test('authenticated user can create news with valid data', function () {
        $image = UploadedFile::fake()->image('test-image.jpg');

        $newsData = [
            'title_ind' => 'Judul Berita Indonesia',
            'title_eng' => 'English News Title',
            'slug_ind' => 'judul-berita-indonesia',
            'slug_eng' => 'english-news-title',
            'content_ind' => 'Konten berita dalam bahasa Indonesia',
            'content_eng' => 'News content in English',
            'publish_date' => '2025-09-15',
            'category' => 'blog',
            'image' => $image,
            'is_active' => true,
        ];

        $response = $this
            ->actingAs($this->user)
            ->post(route('news.store'), $newsData);

        $response->assertRedirect(route('news.index'));
        $response->assertSessionHas('success', 'News created successfully.');

        $this->assertDatabaseHas('news', [
            'title_eng' => 'English News Title',
            'slug_eng' => 'english-news-title',
            'category' => 'blog',
            'is_active' => true,
        ]);

        // Check if image was stored
        $news = News::where('title_eng', 'English News Title')->first();
        expect($news->image)->toContain('storage/news/');
        Storage::disk('public')->assertExists(str_replace('storage/', '', $news->image));
    });

    test('creating news validates required fields', function () {
        $response = $this
            ->actingAs($this->user)
            ->post(route('news.store'), []);

        $response->assertSessionHasErrors([
            'title_ind',
            'title_eng',
            'slug_ind',
            'slug_eng',
            'content_ind',
            'content_eng',
            'publish_date',
            'category',
            'image',
        ]);
    });

    test('creating news validates unique slugs', function () {
        $existingNews = News::factory()->create([
            'slug_ind' => 'existing-slug-ind',
            'slug_eng' => 'existing-slug-eng',
        ]);

        $image = UploadedFile::fake()->image('test.jpg');

        $newsData = [
            'title_ind' => 'New Title',
            'title_eng' => 'New English Title',
            'slug_ind' => 'existing-slug-ind',
            'slug_eng' => 'existing-slug-eng',
            'content_ind' => 'Content',
            'content_eng' => 'English Content',
            'publish_date' => '2025-09-15',
            'category' => 'blog',
            'image' => $image,
        ];

        $response = $this
            ->actingAs($this->user)
            ->post(route('news.store'), $newsData);

        $response->assertSessionHasErrors(['slug_ind', 'slug_eng']);
    });

    test('creating news validates slug format', function () {
        $image = UploadedFile::fake()->image('test.jpg');

        $newsData = [
            'title_ind' => 'Title',
            'title_eng' => 'English Title',
            'slug_ind' => 'Invalid Slug With Spaces!',
            'slug_eng' => 'Another-Invalid@Slug',
            'content_ind' => 'Content',
            'content_eng' => 'English Content',
            'publish_date' => '2025-09-15',
            'category' => 'blog',
            'image' => $image,
        ];

        $response = $this
            ->actingAs($this->user)
            ->post(route('news.store'), $newsData);

        $response->assertSessionHasErrors(['slug_ind', 'slug_eng']);
    });

    test('creating news validates category values', function () {
        $image = UploadedFile::fake()->image('test.jpg');

        $newsData = [
            'title_ind' => 'Title',
            'title_eng' => 'English Title',
            'slug_ind' => 'title',
            'slug_eng' => 'english-title',
            'content_ind' => 'Content',
            'content_eng' => 'English Content',
            'publish_date' => '2025-09-15',
            'category' => 'invalid-category',
            'image' => $image,
        ];

        $response = $this
            ->actingAs($this->user)
            ->post(route('news.store'), $newsData);

        $response->assertSessionHasErrors(['category']);
    });

    test('authenticated user can view edit news page', function () {
        $news = News::factory()->create();

        $response = $this
            ->actingAs($this->user)
            ->get(route('news.edit', $news->id));

        $response->assertStatus(200);
        $response->assertViewIs('backend.news.form');
        $response->assertViewHas('news', $news);
        $response->assertViewHas('isEdit', true);
    });

    test('authenticated user can update news', function () {
        $news = News::factory()->create([
            'title_eng' => 'Original Title',
            'category' => 'blog',
        ]);

        $updateData = [
            'title_ind' => 'Updated Indonesian Title',
            'title_eng' => 'Updated English Title',
            'slug_ind' => 'updated-indonesian-title',
            'slug_eng' => 'updated-english-title',
            'content_ind' => 'Updated Indonesian content',
            'content_eng' => 'Updated English content',
            'publish_date' => '2025-09-16',
            'category' => 'news',
            'is_active' => false,
        ];

        $response = $this
            ->actingAs($this->user)
            ->put(route('news.update', $news->id), $updateData);

        $response->assertRedirect(route('news.index'));
        $response->assertSessionHas('success', 'News updated successfully.');

        $this->assertDatabaseHas('news', [
            'id' => $news->id,
            'title_eng' => 'Updated English Title',
            'category' => 'news',
            'is_active' => false,
        ]);
    });

    test('updating news validates unique slugs for other records', function () {
        $news1 = News::factory()->create([
            'slug_ind' => 'first-slug-ind',
            'slug_eng' => 'first-slug-eng',
        ]);

        $news2 = News::factory()->create([
            'slug_ind' => 'second-slug-ind',
            'slug_eng' => 'second-slug-eng',
        ]);

        $updateData = [
            'title_ind' => 'Title',
            'title_eng' => 'English Title',
            'slug_ind' => 'first-slug-ind', // Trying to use news1's slug
            'slug_eng' => 'first-slug-eng', // Trying to use news1's slug
            'content_ind' => 'Content',
            'content_eng' => 'English Content',
            'publish_date' => '2025-09-15',
            'category' => 'blog',
        ];

        $response = $this
            ->actingAs($this->user)
            ->put(route('news.update', $news2->id), $updateData);

        $response->assertSessionHasErrors(['slug_ind', 'slug_eng']);
    });

    test('updating news allows keeping same slugs', function () {
        $news = News::factory()->create([
            'slug_ind' => 'same-slug-ind',
            'slug_eng' => 'same-slug-eng',
        ]);

        $updateData = [
            'title_ind' => 'Updated Title',
            'title_eng' => 'Updated English Title',
            'slug_ind' => 'same-slug-ind', // Keeping same slug
            'slug_eng' => 'same-slug-eng', // Keeping same slug
            'content_ind' => 'Updated content',
            'content_eng' => 'Updated English content',
            'publish_date' => '2025-09-15',
            'category' => 'blog',
        ];

        $response = $this
            ->actingAs($this->user)
            ->put(route('news.update', $news->id), $updateData);

        $response->assertRedirect(route('news.index'));
        $response->assertSessionHas('success');
    });

    test('authenticated user can delete news', function () {
        $news = News::factory()->create();

        $response = $this
            ->actingAs($this->user)
            ->delete(route('news.destroy', $news->id));

        $response->assertRedirect(route('news.index'));
        $response->assertSessionHas('success', 'News deleted successfully.');

        $this->assertSoftDeleted('news', [
            'id' => $news->id,
        ]);
    });

    test('deleting non-existent news returns 404', function () {
        $response = $this
            ->actingAs($this->user)
            ->delete(route('news.destroy', 999));

        $response->assertStatus(404);
    });
});

describe('News Filtering', function () {
    test('can filter news by keyword', function () {
        $news1 = News::factory()->create([
            'title_ind' => 'Berita Kesehatan',
            'title_eng' => 'Health News',
        ]);

        $news2 = News::factory()->create([
            'title_ind' => 'Berita Teknologi',
            'title_eng' => 'Technology News',
        ]);

        $response = $this
            ->actingAs($this->user)
            ->get(route('news.index', ['keyword' => 'Health']));

        $response->assertStatus(200);
        $response->assertSee('Health News');
        $response->assertDontSee('Technology News');
    });

    test('can filter news by publish date', function () {
        $news1 = News::factory()->create([
            'publish_date' => '2025-09-15',
            'title_eng' => 'Today News',
        ]);

        $news2 = News::factory()->create([
            'publish_date' => '2025-09-14',
            'title_eng' => 'Yesterday News',
        ]);

        $response = $this
            ->actingAs($this->user)
            ->get(route('news.index', ['publish_date' => '2025-09-15']));

        $response->assertStatus(200);
        $response->assertSee('Today News');
        $response->assertDontSee('Yesterday News');
    });

    test('can filter news by category', function () {
        $news1 = News::factory()->create([
            'category' => 'blog',
            'title_eng' => 'Blog Post',
        ]);

        $news2 = News::factory()->create([
            'category' => 'news',
            'title_eng' => 'News Article',
        ]);

        $response = $this
            ->actingAs($this->user)
            ->get(route('news.index', ['category' => 'blog']));

        $response->assertStatus(200);
        $response->assertSee('Blog Post');
        $response->assertDontSee('News Article');
    });

    test('can filter news by status', function () {
        $news1 = News::factory()->create([
            'is_active' => true,
            'title_eng' => 'Active News',
        ]);

        $news2 = News::factory()->create([
            'is_active' => false,
            'title_eng' => 'Inactive News',
        ]);

        $response = $this
            ->actingAs($this->user)
            ->get(route('news.index', ['status' => '1']));

        $response->assertStatus(200);
        $response->assertSee('Active News');
        $response->assertDontSee('Inactive News');
    });

    test('can combine multiple filters', function () {
        $news1 = News::factory()->create([
            'title_eng' => 'Health Blog Post',
            'category' => 'blog',
            'is_active' => true,
        ]);

        $news2 = News::factory()->create([
            'title_eng' => 'Health News Article',
            'category' => 'news',
            'is_active' => true,
        ]);

        $news3 = News::factory()->create([
            'title_eng' => 'Tech Blog Post',
            'category' => 'blog',
            'is_active' => false,
        ]);

        $response = $this
            ->actingAs($this->user)
            ->get(route('news.index', [
                'keyword' => 'Health',
                'category' => 'blog',
                'status' => '1',
            ]));

        $response->assertStatus(200);
        $response->assertSee('Health Blog Post');
        $response->assertDontSee('Health News Article');
        $response->assertDontSee('Tech Blog Post');
    });
});

describe('News Image Handling', function () {
    test('creating news with image stores file correctly', function () {
        $image = UploadedFile::fake()->image('test-image.jpg', 800, 600);

        $newsData = [
            'title_ind' => 'Test Title',
            'title_eng' => 'Test English Title',
            'slug_ind' => 'test-title',
            'slug_eng' => 'test-english-title',
            'content_ind' => 'Test content',
            'content_eng' => 'Test English content',
            'publish_date' => '2025-09-15',
            'category' => 'blog',
            'image' => $image,
            'is_active' => true,
        ];

        $this
            ->actingAs($this->user)
            ->post(route('news.store'), $newsData);

        $news = News::where('title_eng', 'Test English Title')->first();
        expect($news->image)->toContain('storage/news/');

        Storage::disk('public')->assertExists(str_replace('storage/', '', $news->image));
    });

    test('updating news replaces old image', function () {
        // Create news with initial image
        $oldImage = UploadedFile::fake()->image('old-image.jpg');
        $news = News::factory()->create();

        // Simulate storing old image
        $oldImagePath = $oldImage->storeAs('news', 'old-image.jpg', 'public');
        $news->update(['image' => 'storage/' . $oldImagePath]);

        // Update with new image
        $newImage = UploadedFile::fake()->image('new-image.jpg');

        $updateData = [
            'title_ind' => $news->title_ind,
            'title_eng' => $news->title_eng,
            'slug_ind' => $news->slug_ind,
            'slug_eng' => $news->slug_eng,
            'content_ind' => $news->content_ind,
            'content_eng' => $news->content_eng,
            'publish_date' => $news->publish_date->format('Y-m-d'),
            'category' => $news->category,
            'image' => $newImage,
        ];

        $this
            ->actingAs($this->user)
            ->put(route('news.update', $news->id), $updateData);

        $news->refresh();
        expect($news->image)->not->toContain('old-image.jpg');
        expect($news->image)->toContain('storage/news/');
    });

    test('deleting news removes associated image', function () {
        $image = UploadedFile::fake()->image('test-image.jpg');
        $imagePath = $image->storeAs('news', 'test-image.jpg', 'public');

        $news = News::factory()->create([
            'image' => 'storage/' . $imagePath,
        ]);

        Storage::disk('public')->assertExists($imagePath);

        $this
            ->actingAs($this->user)
            ->delete(route('news.destroy', $news->id));

        Storage::disk('public')->assertMissing($imagePath);
    });
});

describe('News Duplicate Prevention', function () {
    test('prevents duplicate news creation', function () {
        $image = UploadedFile::fake()->image('test.jpg');

        $newsData = [
            'title_ind' => 'Same Title',
            'title_eng' => 'Same English Title',
            'slug_ind' => 'same-title',
            'slug_eng' => 'same-english-title',
            'content_ind' => 'Content',
            'content_eng' => 'English Content',
            'publish_date' => '2025-09-15',
            'category' => 'blog',
            'image' => $image,
        ];

        // First submission should succeed
        $response1 = $this
            ->actingAs($this->user)
            ->post(route('news.store'), $newsData);

        $response1->assertRedirect(route('news.index'));
        $response1->assertSessionHas('success');

        // Immediate duplicate submission should be prevented
        $response2 = $this
            ->actingAs($this->user)
            ->post(route('news.store'), $newsData);

        $response2->assertRedirect(route('news.index'));
        $response2->assertSessionHas('error');
        $response2->assertSessionHas('error', 'Duplicate submission detected. News already created.');
    });
});

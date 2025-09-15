<x-layouts.app :title="$news->title">
    <div class="min-h-screen">
        <!-- Header Section -->
        <div class="mx-auto max-w-4xl">
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('berita.index') }}" class="btn btn-ghost btn-sm">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back to News
                        </a>
                        <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">News Details</h1>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('berita.edit', $news->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit mr-2"></i>
                            Edit
                        </a>
                        <button type="button" class="btn btn-error btn-sm"
                            onclick="askDelete('{{ route('berita.destroy', $news->id) }}', '{{ $news->title_eng }}')">
                            <i class="fas fa-trash mr-2"></i>
                            Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- News Content Card -->
            <div class="card shadow-lg">
                <div class="card-body">
                    <!-- News Image -->
                    @if ($news->image)
                        <div class="mb-6">
                            <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="h-64 w-full rounded-lg object-cover">
                        </div>
                    @endif

                    <!-- News Meta Information -->
                    <div class="mb-6 grid grid-cols-1 gap-4 rounded-lg bg-gray-50 p-4 md:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-600">Publish Date</label>
                            <p class="text-gray-900">{{ $news->publish_date->format('d F Y') }}</p>
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-600">Category</label>
                            <span class="badge badge-primary">{{ strtoupper($news->category) }}</span>
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-600">Status</label>
                            @if ($news->is_active)
                                <span class="badge badge-success">
                                    <i class="fas fa-check mr-1"></i>
                                    Active
                                </span>
                            @else
                                <span class="badge badge-error">
                                    <i class="fas fa-times mr-1"></i>
                                    Inactive
                                </span>
                            @endif
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-600">Created</label>
                            <p class="text-gray-900">{{ $news->created_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>

                    <!-- Indonesian Content -->
                    <div class="mb-8">
                        <h2 class="mb-4 flex items-center text-xl font-bold text-gray-900">
                            <i class="fas fa-globe mr-2 text-red-500"></i>
                            Indonesian Version
                        </h2>

                        <div class="rounded-lg border bg-white p-6">
                            <div class="mb-4">
                                <label class="mb-2 block text-sm font-medium text-gray-600">Title</label>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $news->title_ind }}</h3>
                            </div>

                            <div class="mb-4">
                                <label class="mb-2 block text-sm font-medium text-gray-600">Slug</label>
                                <code class="rounded bg-gray-100 px-2 py-1 text-sm">{{ $news->slug_ind }}</code>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-600">Content</label>
                                <div class="prose max-w-none">
                                    {!! $news->content_ind !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- English Content -->
                    <div class="mb-6">
                        <h2 class="mb-4 flex items-center text-xl font-bold text-gray-900">
                            <i class="fas fa-globe mr-2 text-blue-500"></i>
                            English Version
                        </h2>

                        <div class="rounded-lg border bg-white p-6">
                            <div class="mb-4">
                                <label class="mb-2 block text-sm font-medium text-gray-600">Title</label>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $news->title_eng }}</h3>
                            </div>

                            <div class="mb-4">
                                <label class="mb-2 block text-sm font-medium text-gray-600">Slug</label>
                                <code class="rounded bg-gray-100 px-2 py-1 text-sm">{{ $news->slug_eng }}</code>
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-600">Content</label>
                                <div class="prose max-w-none">
                                    {!! $news->content_eng !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Preview Links -->
                    <div class="rounded border-l-4 border-blue-400 bg-blue-50 p-4">
                        <div class="mb-2 flex items-center">
                            <i class="fas fa-external-link-alt mr-2 text-blue-600"></i>
                            <h4 class="text-sm font-medium text-blue-900">Public Preview Links</h4>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('news.show', $news->slug_ind) }}" target="_blank" class="btn btn-sm btn-outline btn-info">
                                <i class="fas fa-eye mr-1"></i>
                                View Indonesian
                            </a>
                            <a href="{{ route('news.show', $news->slug_eng) }}" target="_blank" class="btn btn-sm btn-outline btn-info">
                                <i class="fas fa-eye mr-1"></i>
                                View English
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related News -->
            @if ($relatedNews && $relatedNews->count() > 0)
                <div class="card mt-6 shadow">
                    <div class="card-body">
                        <h3 class="card-title mb-4">
                            <i class="fas fa-newspaper mr-2"></i>
                            Related News ({{ $relatedNews->count() }})
                        </h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            @foreach ($relatedNews as $related)
                                <div class="card compact bg-base-100 border shadow-sm">
                                    <div class="card-body">
                                        <h4 class="card-title text-sm">{{ $related->title }}</h4>
                                        <p class="text-xs text-gray-500">{{ $related->publish_date->format('d M Y') }}</p>
                                        <div class="card-actions justify-end">
                                            <a href="{{ route('berita.backend.show', $related->id) }}" class="btn btn-xs btn-primary">View</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            function askDelete(url, title) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: `You are about to delete the news "${title}". This action cannot be undone.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Create a form to submit the DELETE request
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = url;

                        // Add CSRF token input
                        const csrfInput = document.createElement('input');
                        csrfInput.type = 'hidden';
                        csrfInput.name = '_token';
                        csrfInput.value = '{{ csrf_token() }}';
                        form.appendChild(csrfInput);

                        // Add method spoofing input for DELETE
                        const methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = '_method';
                        methodInput.value = 'DELETE';
                        form.appendChild(methodInput);

                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            }
        </script>
    @endpush
</x-layouts.app>


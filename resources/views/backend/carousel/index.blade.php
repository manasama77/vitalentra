<x-layouts.app :title="__('Carousel Management')">
    <div class="min-h-screen">
        <!-- Header Section -->
        <div class="mx-auto max-w-7xl">
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <h1 class="mb-2 text-3xl font-bold text-gray-900 sm:text-4xl">Carousel Management</h1>
                    <a href="{{ route('carousel.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus mr-2"></i>
                        Create Carousel
                    </a>
                </div>
            </div>

            <!-- Filters Card -->
            <div class="card mb-6 shadow">
                <div class="card-body">
                    <h3 class="card-title mb-4">
                        <i class="fas fa-filter mr-2"></i>
                        Filters
                    </h3>

                    <form method="GET" action="{{ route('carousel.index') }}" class="space-y-4">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                            <!-- Keyword Search -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-medium">Search Keywords</span>
                                </label>
                                <input type="text" name="keyword" value="{{ $filters['keyword'] ?? '' }}" placeholder="Search in titles..."
                                    class="input input-bordered input-sm">
                            </div>

                            <!-- Status Filter -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-medium">Status</span>
                                </label>
                                <select name="status" class="select select-bordered select-sm">
                                    <option value="">All Status</option>
                                    <option value="1" {{ ($filters['status'] ?? '') === '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($filters['status'] ?? '') === '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Filter Actions -->
                        <div class="flex flex-wrap gap-2 pt-4">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-search mr-2"></i>
                                Apply Filters
                            </button>
                            <a href="{{ route('carousel.index') }}" class="btn btn-outline btn-sm">
                                <i class="fas fa-times mr-2"></i>
                                Clear Filters
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Results Summary -->
            @if (request()->hasAny(['keyword', 'status']))
                <div class="alert alert-info mb-6">
                    <div>
                        <i class="fas fa-info-circle mr-2"></i>
                        <span>
                            Showing {{ $carousels->count() }} of {{ $carousels->total() }} results
                            @if ($filters['keyword'] ?? false)
                                for keyword "{{ $filters['keyword'] }}"
                            @endif
                            @if (isset($filters['status']) && $filters['status'] !== '')
                                with status "{{ $filters['status'] == '1' ? 'Active' : 'Inactive' }}"
                            @endif
                        </span>
                    </div>
                </div>
            @endif

            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="alert alert-success mb-6">
                    <div>
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-error mb-6">
                    <div>
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <!-- Carousel Table -->
            <div class="card shadow">
                <div class="h-fit w-full overflow-x-auto">
                    <table class="table-xs table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <i class="fas fa-cogs"></i>
                                </th>
                                <th>Title</th>
                                <th class="text-center">
                                    <i class="fas fa-image"></i>
                                </th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carousels as $c)
                                <tr class="row-hover">
                                    <td class="text-center">
                                        <div class="flex justify-center gap-1">
                                            <div class="tooltip">
                                                <a href="{{ route('carousel.edit', ['carousel' => $c->id]) }}"
                                                    class="btn btn-sm btn-primary tooltip-toggle" data-tip="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                                                    <span class="tooltip-body">Edit</span>
                                                </span>
                                            </div>
                                            <div class="tooltip">
                                                <button type="button" class="btn btn-sm btn-error tooltip-toggle" data-tip="Delete"
                                                    onclick="askDelete('{{ route('carousel.destroy', ['carousel' => $c->id]) }}', '{{ $c->title }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                                                    <span class="tooltip-body">Delete</span>
                                                </span>
                                            </div>
                                            <div class="tooltip {{ $loop->first ? 'hidden' : '' }}">
                                                <a href="{{ route('carousel.up', ['carousel' => $c->id]) }}"
                                                    class="btn btn-sm btn-warning tooltip-toggle" data-tip="Move Up">
                                                    <i class="fas fa-arrow-up"></i>
                                                </a>
                                                <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                                                    <span class="tooltip-body">Move Up</span>
                                                </span>
                                            </div>
                                            <div class="tooltip {{ $loop->last ? 'hidden' : '' }}">
                                                <a href="{{ route('carousel.down', ['carousel' => $c->id]) }}"
                                                    class="btn btn-sm btn-warning tooltip-toggle" data-tip="Move Down">
                                                    <i class="fas fa-arrow-down"></i>
                                                </a>
                                                <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
                                                    <span class="tooltip-body">Move Down</span>
                                                </span>
                                            </div </div>
                                    </td>
                                    <td>
                                        <div title="{{ $c->title }}">
                                            {{ $c->title }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex justify-center">
                                            <img src="{{ asset($c->image) }}" alt="{{ $c->title }}"
                                                class="h-16 w-auto rounded-md object-cover shadow-sm">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if ($c->is_active)
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
                                    </td>
                                    <td class="text-center">
                                        <code class="text-xs">{{ $c->order }}</code>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <i class="fas fa-images mb-4 text-6xl text-gray-300"></i>
                                            <h3 class="mb-2 text-lg font-medium text-gray-500">No carousel found</h3>
                                            <p class="mb-4 text-gray-400">
                                                @if (request()->hasAny(['keyword', 'status']))
                                                    Try adjusting your filters or search criteria.
                                                @else
                                                    Get started by creating your first carousel item.
                                                @endif
                                            </p>
                                            <a href="{{ route('carousel.create') }}" class="btn btn-primary">
                                                <i class="fas fa-plus mr-2"></i>
                                                Create Carousel Item
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($carousels->hasPages())
                    {{ $carousels->links('vendor.pagination.tailwind') }}
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function askDelete(url, title) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: `You are about to delete the carousel "${title}". This action cannot be undone.`,
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


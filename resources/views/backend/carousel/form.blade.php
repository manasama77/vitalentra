<x-layouts.app :title="$isEdit ? 'Edit Carousel' : 'Create Carousel'">
    <div class="min-h-screen">
        <!-- Header Section -->
        <div class="mx-auto max-w-7xl">
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <h1 class="mb-2 text-3xl font-bold text-gray-900 sm:text-4xl">
                        {{ $isEdit ? 'Edit Carousel' : 'Create Carousel' }}
                    </h1>
                    <a href="{{ route('carousel.index') }}" class="btn btn-outline">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to List
                    </a>
                </div>
            </div>

            <!-- Form Card -->
            <div class="card shadow">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-error mb-6">
                            <div>
                                <h3 class="font-bold">There were some errors with your submission:</h3>
                                <ul class="mt-2 list-inside list-disc">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form action="{{ $isEdit ? route('carousel.update', ['carousel' => $carousel->id]) : route('carousel.store') }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @if ($isEdit)
                            @method('PUT')
                        @endif

                        <!-- Title Fields -->
                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-medium">Title <span class="text-error">*</span></span>
                                </label>
                                <input type="text" name="title" value="{{ old('title', $carousel->title) }}"
                                    class="input input-bordered @error('title') input-error @enderror" placeholder="Enter Indonesian title" required>
                                @error('title')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-medium">Status</span>
                                </label>
                                <div class="flex items-center gap-1">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" class="checkbox" id="status_checkbox" name="is_active" value="1"
                                        {{ old('is_active', $carousel->is_active) ? 'checked' : '' }} />
                                    <label class="label-text text-base" for="status_checkbox">Active</label>
                                </div>
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-medium">
                                    Image
                                </span>
                            </label>

                            <!-- Custom File Upload with Preview -->
                            <div class="space-y-4">
                                <div class="flex w-full items-center justify-center">
                                    <label for="image-upload"
                                        class="@error('image') border-red-500 @enderror flex h-32 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100">
                                        <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                            <svg class="mb-4 h-8 w-8 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span></p>
                                            <p class="text-xs text-gray-500">JPEG, PNG, JPG, GIF, WebP (MAX. 10MB)</p>
                                        </div>
                                        <input id="image-upload" type="file" name="image" accept="image/*" class="hidden"
                                            onchange="previewImage(event)" />
                                    </label>
                                </div>

                                <!-- Image Preview -->
                                <div id="image-preview" class="hidden">
                                    <div class="relative">
                                        <img id="preview-img" src="" alt="Preview"
                                            class="h-48 w-full max-w-md rounded-lg border object-cover">
                                        <button type="button" onclick="removeImage()"
                                            class="absolute right-2 top-2 flex h-6 w-6 items-center justify-center rounded-full bg-red-500 text-white hover:bg-red-600">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <p id="file-name" class="mt-2 text-sm text-gray-600"></p>
                                </div>
                            </div>

                            <label class="label">
                                <span class="label-text-alt">Accepted formats: JPEG, PNG, JPG, GIF, WebP. Max size: 10MB</span>
                            </label>
                            @if ($isEdit && $carousel->image)
                                <div class="mt-2">
                                    <img src="{{ asset($carousel->image) }}" alt="Current image" class="h-32 w-32 rounded-lg border object-cover">
                                    <p class="mt-1 text-sm text-gray-600">Current image</p>
                                </div>
                            @endif
                            @error('image')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        <!-- Content Fields -->
                        <div class="space-y-6">
                            <!-- Form Actions -->
                            <div class="flex flex-col gap-4 pt-6 sm:flex-row">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-2"></i>
                                    {{ $isEdit ? 'Update Carousel' : 'Create Carousel' }}
                                </button>
                                <a href="{{ route('carousel.index') }}" class="btn btn-outline">
                                    <i class="fas fa-times mr-2"></i>
                                    Cancel
                                </a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Image Preview Functions
            function previewImage(event) {
                const file = event.target.files[0];
                const preview = document.getElementById('image-preview');
                const previewImg = document.getElementById('preview-img');
                const fileName = document.getElementById('file-name');

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        fileName.textContent = file.name;
                        preview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.classList.add('hidden');
                }
            }

            function removeImage() {
                const fileInput = document.getElementById('image-upload');
                const preview = document.getElementById('image-preview');

                fileInput.value = '';
                preview.classList.add('hidden');
            }

            // Form submission with validation
            document.querySelector('form').addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="loading loading-spinner loading-sm mr-2"></span>Processing...';

                // Re-enable after 5 seconds as fallback
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '{{ $isEdit ? 'Update Carousel' : 'Create Carousel' }}';
                }, 5000);
            });
        </script>
    @endpush
</x-layouts.app>


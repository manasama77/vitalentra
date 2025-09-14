<x-layouts.app :title="$isEdit ? 'Edit News' : 'Create News'">
    <div class="min-h-screen">
        <!-- Header Section -->
        <div class="mx-auto max-w-7xl">
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <h1 class="mb-2 text-3xl font-bold text-gray-900 sm:text-4xl">
                        {{ $isEdit ? 'Edit News' : 'Create News' }}
                    </h1>
                    <a href="{{ route('berita.index') }}" class="btn btn-outline">
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

                    <form action="{{ $isEdit ? route('berita.update', $news->id) : route('berita.store') }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @if ($isEdit)
                            @method('PUT')
                        @endif

                        <!-- Title Fields -->
                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-medium">Indonesian Title <span class="text-error">*</span></span>
                                </label>
                                <input type="text" name="title_ind" value="{{ old('title_ind', $news->title_ind) }}"
                                    class="input input-bordered @error('title_ind') input-error @enderror" placeholder="Enter Indonesian title"
                                    required>
                                @error('title_ind')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-medium">English Title <span class="text-error">*</span></span>
                                </label>
                                <input type="text" name="title_eng" value="{{ old('title_eng', $news->title_eng) }}"
                                    class="input input-bordered @error('title_eng') input-error @enderror" placeholder="Enter English title" required>
                                @error('title_eng')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                        </div>

                        <!-- Slug Fields -->
                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-medium">Indonesian Slug <span class="text-error">*</span></span>
                                </label>
                                <input type="text" name="slug_ind" value="{{ old('slug_ind', $news->slug_ind) }}"
                                    class="input input-bordered @error('slug_ind') input-error @enderror" placeholder="indonesian-slug-format"
                                    required>
                                <label class="label">
                                    <span class="label-text-alt">Use lowercase letters, numbers, and hyphens only</span>
                                </label>
                                @error('slug_ind')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-medium">English Slug <span class="text-error">*</span></span>
                                </label>
                                <input type="text" name="slug_eng" value="{{ old('slug_eng', $news->slug_eng) }}"
                                    class="input input-bordered @error('slug_eng') input-error @enderror" placeholder="english-slug-format" required>
                                <label class="label">
                                    <span class="label-text-alt">Use lowercase letters, numbers, and hyphens only</span>
                                </label>
                                @error('slug_eng')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                        </div>

                        <!-- Publish Date, Category, and Status -->
                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-medium">Publish Date <span class="text-error">*</span></span>
                                </label>
                                <input type="date" name="publish_date"
                                    value="{{ old('publish_date', $news->publish_date ? $news->publish_date->format('Y-m-d') : '') }}"
                                    class="input input-bordered @error('publish_date') input-error @enderror" required>
                                @error('publish_date')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-medium">Category <span class="text-error">*</span></span>
                                </label>
                                <select name="category" class="select select-bordered @error('category') select-error @enderror" required>
                                    <option value="">Select Category</option>
                                    <option value="blog" {{ old('category', $news->category) === 'blog' ? 'selected' : '' }}>Blog</option>
                                    <option value="news" {{ old('category', $news->category) === 'news' ? 'selected' : '' }}>News</option>
                                    <option value="press release" {{ old('category', $news->category) === 'press release' ? 'selected' : '' }}>Press
                                        Release</option>
                                </select>
                                @error('category')
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
                                    <input type="checkbox" class="checkbox" id="defaultCheckbox1" name="is_active" value="1"
                                        {{ old('is_active', $news->is_active) ? 'checked' : '' }} />
                                    <label class="label-text text-base" for="defaultCheckbox1">Active</label>
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
                                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and
                                                drop</p>
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
                            @if ($isEdit && $news->image)
                                <div class="mt-2">
                                    <img src="{{ asset($news->image) }}" alt="Current image" class="h-32 w-32 rounded-lg border object-cover">
                                    <p class="mt-1 text-sm text-gray-600">Current image</p>
                                </div>
                            @endif
                            @error('image')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-medium">Indonesian Content <span class="text-error">*</span></span>
                            </label>
                            <!-- Hidden textarea for form submission -->
                            <textarea name="content_ind" id="content_ind_hidden" class="hidden">{{ old('content_ind', $news->content_ind) }}</textarea>
                            <!-- Quill editor container -->
                            <div id="content_ind" class="@error('content_ind') border-red-500 @enderror quill rounded-lg border border-gray-300">
                            </div>
                            @error('content_ind')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-medium">English Content <span class="text-error">*</span></span>
                            </label>
                            <!-- Hidden textarea for form submission -->
                            <textarea name="content_eng" id="content_eng_hidden" class="hidden">{{ old('content_eng', $news->content_eng) }}</textarea>
                            <!-- Quill editor container -->
                            <div id="content_eng" class="@error('content_eng') border-red-500 @enderror quill rounded-lg border border-gray-300">
                            </div>
                            @error('content_eng')
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
                                    {{ $isEdit ? 'Update News' : 'Create News' }}
                                </button>
                                <a href="{{ route('berita.index') }}" class="btn btn-outline">
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
        <!-- Quill.js CSS and JS -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

        <script>
            // Auto-generate slugs from titles

            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Quill for Indonesian content
                var quillInd = new Quill('#content_ind', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{
                                'header': [1, 2, 3, false]
                            }],
                            ['bold', 'italic', 'underline', 'strike'],
                            ['blockquote', 'code-block'],
                            [{
                                'list': 'ordered'
                            }, {
                                'list': 'bullet'
                            }],
                            [{
                                'script': 'sub'
                            }, {
                                'script': 'super'
                            }],
                            [{
                                'indent': '-1'
                            }, {
                                'indent': '+1'
                            }],
                            ['link', 'image'],
                            ['clean']
                        ]
                    },
                    placeholder: 'Enter Indonesian content...',
                    formats: ['header', 'bold', 'italic', 'underline', 'strike', 'blockquote', 'code-block', 'list', 'bullet', 'script',
                        'indent', 'link', 'image'
                    ]
                });

                // Initialize Quill for English content
                var quillEng = new Quill('#content_eng', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{
                                'header': [1, 2, 3, false]
                            }],
                            ['bold', 'italic', 'underline', 'strike'],
                            ['blockquote', 'code-block'],
                            [{
                                'list': 'ordered'
                            }, {
                                'list': 'bullet'
                            }],
                            [{
                                'script': 'sub'
                            }, {
                                'script': 'super'
                            }],
                            [{
                                'indent': '-1'
                            }, {
                                'indent': '+1'
                            }],
                            ['link', 'image'],
                            ['clean']
                        ]
                    },
                    placeholder: 'Enter English content...',
                    formats: ['header', 'bold', 'italic', 'underline', 'strike', 'blockquote', 'code-block', 'list', 'bullet', 'script',
                        'indent', 'link', 'image'
                    ]
                });

                // Store Quill instances globally
                window.quillInd = quillInd;
                window.quillEng = quillEng;

                // Set existing content if editing or from old() input after validation errors
                var existingContentInd = document.getElementById('content_ind_hidden').value;
                var existingContentEng = document.getElementById('content_eng_hidden').value;

                if (existingContentInd) {
                    // If content is from old() input (validation error), it might be HTML
                    // If it's from database, it's also HTML
                    quillInd.root.innerHTML = existingContentInd;
                }
                if (existingContentEng) {
                    // If content is from old() input (validation error), it might be HTML
                    // If it's from database, it's also HTML
                    quillEng.root.innerHTML = existingContentEng;
                }

                // Also sync content to hidden fields on any change to preserve state
                quillInd.on('text-change', function() {
                    const content = quillInd.root.innerHTML;
                    const text = quillInd.getText().trim();
                    document.getElementById('content_ind_hidden').value = text ? content : '';
                });

                quillEng.on('text-change', function() {
                    const content = quillEng.root.innerHTML;
                    const text = quillEng.getText().trim();
                    document.getElementById('content_eng_hidden').value = text ? content : '';
                });

                console.log('Quill editors initialized with content:', {
                    indonesian: existingContentInd ? 'loaded' : 'empty',
                    english: existingContentEng ? 'loaded' : 'empty'
                });
            });

            function generateSlug(text) {
                return text
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
                    .replace(/\s+/g, '-') // Replace spaces with hyphens
                    .replace(/-+/g, '-') // Replace multiple hyphens with single
                    .trim('-'); // Remove leading/trailing hyphens
            }

            // Auto-generate Indonesian slug
            document.querySelector('input[name="title_ind"]').addEventListener('input', function() {
                const slug = generateSlug(this.value);
                document.querySelector('input[name="slug_ind"]').value = slug;
            });

            // Auto-generate English slug
            document.querySelector('input[name="title_eng"]').addEventListener('input', function() {
                const slug = generateSlug(this.value);
                document.querySelector('input[name="slug_eng"]').value = slug;
            });

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
                // Update hidden textareas with Quill content before form submission
                if (window.quillInd) {
                    const indContent = window.quillInd.root.innerHTML;
                    // Check if Quill has meaningful content (not just empty tags)
                    const indText = window.quillInd.getText().trim();
                    document.getElementById('content_ind_hidden').value = indText ? indContent : '';
                }
                if (window.quillEng) {
                    const engContent = window.quillEng.root.innerHTML;
                    // Check if Quill has meaningful content (not just empty tags)
                    const engText = window.quillEng.getText().trim();
                    document.getElementById('content_eng_hidden').value = engText ? engContent : '';
                }

                // Client-side validation for Quill content
                const indText = window.quillInd ? window.quillInd.getText().trim() : '';
                const engText = window.quillEng ? window.quillEng.getText().trim() : '';

                if (!indText) {
                    e.preventDefault();
                    alert('Indonesian content is required.');
                    window.quillInd.focus();
                    return false;
                }

                if (!engText) {
                    e.preventDefault();
                    alert('English content is required.');
                    window.quillEng.focus();
                    return false;
                }

                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="loading loading-spinner loading-sm mr-2"></span>Processing...';

                // Re-enable after 5 seconds as fallback
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '{{ $isEdit ? 'Update News' : 'Create News' }}';
                }, 5000);
            });
        </script>
    @endpush
</x-layouts.app>


@props(['modalId', 'name', 'position', 'photo', 'content'])
<!-- Modal Backdrop -->
<div id="modal-{{ $modalId }}"
     class="bg-base-300/90 fixed inset-0 z-50 items-center justify-center p-4"
     style="display: none;">
    <!-- Modal Content -->
    <div class="flex max-h-[85vh] w-full max-w-2xl flex-col rounded-lg bg-white shadow-xl">
        <!-- Header -->
        <div class="flex items-center justify-between border-b p-6">
            <div class="flex items-center gap-4">
                @if ($photo)
                    <img src="{{ $photo }}"
                         alt="{{ $name }}"
                         class="h-12 w-12 rounded-full object-cover" />
                @endif
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">{{ $name }}</h3>
                    <p class="text-sm text-gray-600">{{ $position }}</p>
                </div>
            </div>
            <button type="button"
                    class="text-xl font-bold text-gray-400 hover:text-gray-600"
                    onclick="closeModal('{{ $modalId }}')">
                ×
            </button>
        </div>

        <!-- Body -->
        <div class="flex-1 overflow-y-auto p-6">
            <div class="prose prose-sm max-w-none">
                {!! $content !!}
            </div>
        </div>

        <!-- Footer -->
        <div class="flex justify-end border-t bg-gray-50 p-6">
            <button type="button"
                    class="rounded bg-gray-600 px-4 py-2 text-white hover:bg-gray-700"
                    onclick="closeModal('{{ $modalId }}')">
                Close
            </button>
        </div>
    </div>
</div>

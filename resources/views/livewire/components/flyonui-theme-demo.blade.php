<x-layouts.app.sidebar>
    <div class="p-6">
        <div class="space-y-8">
            <!-- Header -->
            <div class="border-base-300 border-b pb-6">
                <h1 class="text-base-content text-2xl font-bold">{{ __('ui.FlyonUI Theme Demo') }}</h1>
                <p class="text-base-content mt-2 text-sm opacity-70">
                    {{ __('ui.Demonstration of FlyonUI theme colors integrated with Laravel Livewire and Flux UI') }}</p>
            </div>

            <!-- Tabs -->
            <div class="bg-base-200 flex space-x-1 rounded-lg p-1">
                <button wire:click="$set('activeTab', 'colors')"
                    class="{{ $activeTab === 'colors' ? 'bg-primary text-primary-content shadow-sm' : 'text-base-content hover:bg-base-300' }} flex-1 rounded-md px-3 py-2 text-sm font-medium transition-colors">
                    {{ __('ui.Theme Colors') }}
                </button>
                <button wire:click="$set('activeTab', 'components')"
                    class="{{ $activeTab === 'components' ? 'bg-primary text-primary-content shadow-sm' : 'text-base-content hover:bg-base-300' }} flex-1 rounded-md px-3 py-2 text-sm font-medium transition-colors">
                    {{ __('ui.UI Components') }}
                </button>
                <button wire:click="$set('activeTab', 'data')"
                    class="{{ $activeTab === 'data' ? 'bg-primary text-primary-content shadow-sm' : 'text-base-content hover:bg-base-300' }} flex-1 rounded-md px-3 py-2 text-sm font-medium transition-colors">
                    {{ __('ui.Sample Data') }}
                </button>
            </div>

            <!-- Tab Content -->
            <div class="mt-6">
                @if ($activeTab === 'colors')
                    <!-- Theme Colors Demo -->
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                        <!-- Primary -->
                        <div class="border-base-300 bg-base-100 rounded-lg border p-4">
                            <div class="bg-primary mb-3 h-12 w-full rounded"></div>
                            <h3 class="text-base-content font-medium">Primary</h3>
                            <p class="text-base-content text-sm opacity-60">Main brand color</p>
                        </div>

                        <!-- Secondary -->
                        <div class="border-base-300 bg-base-100 rounded-lg border p-4">
                            <div class="bg-secondary mb-3 h-12 w-full rounded"></div>
                            <h3 class="text-base-content font-medium">Secondary</h3>
                            <p class="text-base-content text-sm opacity-60">Supporting color</p>
                        </div>

                        <!-- Accent -->
                        <div class="border-base-300 bg-base-100 rounded-lg border p-4">
                            <div class="bg-accent mb-3 h-12 w-full rounded"></div>
                            <h3 class="text-base-content font-medium">Accent</h3>
                            <p class="text-base-content text-sm opacity-60">Highlight color</p>
                        </div>

                        <!-- Success -->
                        <div class="border-base-300 bg-base-100 rounded-lg border p-4">
                            <div class="bg-success mb-3 h-12 w-full rounded"></div>
                            <h3 class="text-base-content font-medium">Success</h3>
                            <p class="text-base-content text-sm opacity-60">Positive actions</p>
                        </div>

                        <!-- Warning -->
                        <div class="border-base-300 bg-base-100 rounded-lg border p-4">
                            <div class="bg-warning mb-3 h-12 w-full rounded"></div>
                            <h3 class="text-base-content font-medium">Warning</h3>
                            <p class="text-base-content text-sm opacity-60">Caution states</p>
                        </div>

                        <!-- Error -->
                        <div class="border-base-300 bg-base-100 rounded-lg border p-4">
                            <div class="bg-error mb-3 h-12 w-full rounded"></div>
                            <h3 class="text-base-content font-medium">Error</h3>
                            <p class="text-base-content text-sm opacity-60">Error states</p>
                        </div>

                        <!-- Info -->
                        <div class="border-base-300 bg-base-100 rounded-lg border p-4">
                            <div class="bg-info mb-3 h-12 w-full rounded"></div>
                            <h3 class="text-base-content font-medium">Info</h3>
                            <p class="text-base-content text-sm opacity-60">Information</p>
                        </div>

                        <!-- Neutral -->
                        <div class="border-base-300 bg-base-100 rounded-lg border p-4">
                            <div class="bg-neutral mb-3 h-12 w-full rounded"></div>
                            <h3 class="text-base-content font-medium">Neutral</h3>
                            <p class="text-base-content text-sm opacity-60">Text & borders</p>
                        </div>
                    </div>
                @elseif($activeTab === 'components')
                    <!-- UI Components Demo -->
                    <div class="space-y-6">
                        <!-- Buttons -->
                        <div class="space-y-3">
                            <h3 class="text-base-content text-lg font-medium">{{ __('ui.Buttons') }}</h3>
                            <div class="flex flex-wrap gap-3">
                                <flux:button variant="primary">{{ __('ui.Primary Button') }}</flux:button>
                                <flux:button class="bg-secondary text-secondary-content hover:bg-secondary/90">{{ __('ui.Secondary') }}</flux:button>
                                <flux:button class="bg-accent text-accent-content hover:bg-accent/90">{{ __('ui.Accent') }}</flux:button>
                                <flux:button class="bg-success text-success-content hover:bg-success/90">{{ __('ui.Success') }}</flux:button>
                                <flux:button class="bg-warning text-warning-content hover:bg-warning/90">{{ __('ui.Warning') }}</flux:button>
                                <flux:button class="bg-error text-error-content hover:bg-error/90">{{ __('ui.Error') }}</flux:button>
                            </div>
                        </div>

                        <!-- Cards -->
                        <div class="space-y-3">
                            <h3 class="text-base-content text-lg font-medium">{{ __('ui.Cards') }}</h3>
                            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                                <div class="border-primary bg-primary/5 rounded-lg border p-4">
                                    <h4 class="text-primary font-medium">{{ __('ui.Primary Card') }}</h4>
                                    <p class="text-base-content mt-1 text-sm opacity-70">{{ __('ui.With primary theme colors') }}</p>
                                </div>
                                <div class="border-secondary bg-secondary/5 rounded-lg border p-4">
                                    <h4 class="text-secondary font-medium">{{ __('ui.Secondary Card') }}</h4>
                                    <p class="text-base-content mt-1 text-sm opacity-70">{{ __('ui.With secondary theme colors') }}</p>
                                </div>
                                <div class="border-accent bg-accent/5 rounded-lg border p-4">
                                    <h4 class="text-accent font-medium">{{ __('ui.Accent Card') }}</h4>
                                    <p class="text-base-content mt-1 text-sm opacity-70">{{ __('ui.With accent theme colors') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Form Elements -->
                        <div class="space-y-3">
                            <h3 class="text-base-content text-lg font-medium">{{ __('ui.Form Elements') }}</h3>
                            <div class="grid gap-4 sm:grid-cols-2">
                                <flux:input :label="__('ui.Sample Input')" placeholder="Enter text here..." />
                                <flux:select :label="__('ui.Sample Select')">
                                    <option>{{ __('ui.Option 1') }}</option>
                                    <option>{{ __('ui.Option 2') }}</option>
                                    <option>{{ __('ui.Option 3') }}</option>
                                </flux:select>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Sample Data Table -->
                    <div class="space-y-3">
                        <h3 class="text-base-content text-lg font-medium">{{ __('ui.Sample Data Table') }}</h3>
                        <div class="border-base-300 overflow-hidden rounded-lg border">
                            <table class="divide-base-300 w-full divide-y">
                                <thead class="bg-base-200">
                                    <tr>
                                        <th class="text-base-content px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            {{ __('ui.Feature') }}
                                        </th>
                                        <th class="text-base-content px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            {{ __('ui.Status') }}
                                        </th>
                                        <th class="text-base-content px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            {{ __('ui.Users') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-base-300 bg-base-100 divide-y">
                                    @foreach ($sampleData as $item)
                                        <tr>
                                            <td class="text-base-content whitespace-nowrap px-6 py-4 text-sm font-medium">
                                                {{ $item['name'] }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 text-sm">
                                                <span
                                                    class="{{ $item['status'] === 'active' ? 'bg-success text-success-content' : '' }} {{ $item['status'] === 'pending' ? 'bg-warning text-warning-content' : '' }} {{ $item['status'] === 'inactive' ? 'bg-error text-error-content' : '' }} inline-flex rounded-full px-2 py-1 text-xs font-semibold">
                                                    {{ ucfirst($item['status']) }}
                                                </span>
                                            </td>
                                            <td class="text-base-content whitespace-nowrap px-6 py-4 text-sm">
                                                {{ number_format($item['users']) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app.sidebar>

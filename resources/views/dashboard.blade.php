<x-layouts.app :title="__('Dashboard')">
    <div class="min-h-screen">
        <!-- Header Section -->
        <div class="mx-auto max-w-7xl">
            <div class="mb-8">
                <h1 class="mb-2 text-3xl font-bold text-gray-900 sm:text-4xl">Dashboard</h1>
                <p class="text-lg text-gray-600">Welcome back! Here's an overview of your content.</p>
            </div>

            <!-- Stats Grid -->
            <div class="mb-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                <!-- Total Carousels Card -->
                <x-dashboard.card title="Total Carousels" :value="$totalCarousels ?? 0" icon-bg-color="bg-primary" badge-text="Total"
                    badge-color="bg-primary text-success-content">
                    <x-slot:icon>
                        <svg class="fill-primary h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </x-slot>
                </x-dashboard.card>

                <!-- Active Carousels Card -->
                <x-dashboard.card title="Active Carousels" :value="$activeCarousels ?? 0" icon-bg-color="bg-green-100" badge-text="Active"
                    badge-color="bg-blue-100 text-blue-600" :footer-value="round($totalCarousels > 0 ? ($activeCarousels / $totalCarousels) * 100 : 0) . '%'" footer-text="of total" footer-value-color="text-blue-600">
                    <x-slot:icon>
                        <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </x-slot>
                </x-dashboard.card>

                <!-- Total News Card -->
                <x-dashboard.card title="Total News" :value="$totalNews ?? 0" icon-bg-color="bg-purple-100" badge-text="Total"
                    badge-color="bg-orange-100 text-orange-600" :footer-value="$activeNews ?? 0" footer-text="published" footer-value-color="text-purple-600">
                    <x-slot:icon>
                        <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                    </x-slot>
                </x-dashboard.card>

                <!-- Published News Card -->
                <x-dashboard.card title="Published News" :value="$activeNews ?? 0" icon-bg-color="bg-orange-100" badge-text="Published"
                    badge-color="bg-purple-100 text-purple-600" :footer-value="round($totalNews > 0 ? ($activeNews / $totalNews) * 100 : 0) . '%'" footer-text="of total" footer-value-color="text-orange-600">
                    <x-slot:icon>
                        <svg class="h-6 w-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                            </path>
                        </svg>
                    </x-slot>
                </x-dashboard.card>
            </div>
        </div>
    </div>
</x-layouts.app>

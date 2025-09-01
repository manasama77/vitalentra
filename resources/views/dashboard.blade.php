<x-layouts.app :title="__('Dashboard')">
    <div class="min-h-screen">
        <!-- Header Section -->
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">Dashboard</h1>
                <p class="text-gray-600 text-lg">Welcome back! Here's an overview of your content.</p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Carousels Card -->
                <x-dashboard.card title="Total Carousels" :value="$totalCarousels ?? 0" icon-bg-color="bg-blue-100" badge-text="Total"
                    badge-color="bg-green-100 text-green-600" :footer-value="$activeCarousels ?? 0" footer-text="active"
                    footer-value-color="text-green-600">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </x-slot>
                </x-dashboard.card>

                <!-- Active Carousels Card -->
                <x-dashboard.card title="Active Carousels" :value="$activeCarousels ?? 0" icon-bg-color="bg-green-100"
                    badge-text="Active" badge-color="bg-blue-100 text-blue-600" :footer-value="round($totalCarousels > 0 ? ($activeCarousels / $totalCarousels) * 100 : 0) . '%'" footer-text="of total"
                    footer-value-color="text-blue-600">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </x-slot>
                </x-dashboard.card>

                <!-- Total News Card -->
                <x-dashboard.card title="Total News" :value="$totalNews ?? 0" icon-bg-color="bg-purple-100" badge-text="Total"
                    badge-color="bg-orange-100 text-orange-600" :footer-value="$activeNews ?? 0" footer-text="published"
                    footer-value-color="text-purple-600">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                    </x-slot>
                </x-dashboard.card>

                <!-- Published News Card -->
                <x-dashboard.card title="Published News" :value="$activeNews ?? 0" icon-bg-color="bg-orange-100"
                    badge-text="Published" badge-color="bg-purple-100 text-purple-600" :footer-value="round($totalNews > 0 ? ($activeNews / $totalNews) * 100 : 0) . '%'"
                    footer-text="of total" footer-value-color="text-orange-600">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                            </path>
                        </svg>
                    </x-slot>
                </x-dashboard.card>
            </div>

            <!-- Quick Actions Section -->
            {{-- <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Quick Actions</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <button
                        class="flex items-center justify-center p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200 group">
                        <svg class="w-5 h-5 text-blue-600 mr-2 group-hover:scale-110 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        <span class="text-blue-700 font-medium">Add Carousel</span>
                    </button>
                    <button
                        class="flex items-center justify-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition-colors duration-200 group">
                        <svg class="w-5 h-5 text-green-600 mr-2 group-hover:scale-110 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        <span class="text-green-700 font-medium">Add News</span>
                    </button>
                    <button
                        class="flex items-center justify-center p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors duration-200 group">
                        <svg class="w-5 h-5 text-purple-600 mr-2 group-hover:scale-110 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                        <span class="text-purple-700 font-medium">View Analytics</span>
                    </button>
                    <button
                        class="flex items-center justify-center p-4 bg-orange-50 hover:bg-orange-100 rounded-lg transition-colors duration-200 group">
                        <svg class="w-5 h-5 text-orange-600 mr-2 group-hover:scale-110 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-orange-700 font-medium">Settings</span>
                    </button>
                </div>
            </div> --}}

            <!-- Footer Info -->
            {{-- <div class="mt-8 text-center text-gray-500">
                <p class="text-sm">Last updated: <span class="font-medium">{{ now()->format('j F Y, H:i') }}</span>
                </p>
            </div> --}}
        </div>
    </div>
</x-layouts.app>

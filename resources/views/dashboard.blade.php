<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1: Total Cities -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="text-2xl font-bold">{{ $totalCities }}</div>
                    <div class="text-gray-600 dark:text-gray-400">Total Cities</div>
                </div>

                <!-- Card 2: Total Citizens -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="text-2xl font-bold">{{ $totalCitizens }}</div>
                    <div class="text-gray-600 dark:text-gray-400">Total Citizens</div>
                </div>

                <!-- Card 3: Citizens per City -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-4">Citizens per City</h3>
                    <ul>
                        @foreach($citiesWithCitizens as $city)
                            <li>{{ $city->name }}: {{ $city->citizens_count }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


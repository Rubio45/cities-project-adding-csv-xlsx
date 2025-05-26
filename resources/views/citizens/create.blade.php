<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Citizen') }}
            </h2>
            <a href="{{ route('citizens.index') }}"
                class="inline-block px-4 py-2 bg-blue-600 text-gray-800 dark:text-gray-200 rounded hover:bg-blue-700 transition">
                {{ __('Back to Citizens List') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('citizens.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="first_name" class="block text-gray-700"> {{ __('First Name') }}</label>
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            @error('first_name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="last_name" class="block text-gray-700">{{ __('Last Name') }}</label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            @error('last_name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="gender" class="block text-gray-700">{{ __('Gender') }}</label>
                            <select name="gender" id="gender"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <option value="">Select Gender</option>
                                <option value="MASCULINO">{{ __('Male') }}</option>
                                <option value="FEMENINO">{{ __('Female') }}</option>
                            </select>
                            @error('gender')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="birth_date" class="block text-gray-700">{{ __('Birth Date') }}</label>
                            <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            @error('birth_date')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="city_id" class="block text-gray-700">{{ __('City') }}</label>
                            <select name="city_id" id="city_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <option value="">Select City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('city_id')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>


                        <button type="submit"
                            class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Create Citizen') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-secondary-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-secondary-800">
                    <h3 class="text-lg font-medium">{{ __("Je bent ingelogd!") }}</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Welkom op het dashboard. Je kunt hier je merkbeheer uitvoeren.
                    </p>
                </div>

                <div class="p-6">
                    <a href="{{ route('brands.index') }}"
                       class="bg-primary-600 hover:bg-primary-700 text-black font-semibold py-2 px-4 rounded-md shadow transition">
                        Bekijk Merken
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-primary-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-xl overflow-hidden">
                <div class="p-8 bg-gradient-to-r from-primary-600 to-primary-500 text-white">
                    <h3 class="text-2xl font-semibold">{{ __("Je bent ingelogd!") }}</h3>
                    <p class="mt-2 text-sm text-gray-100">
                        Welkom op het dashboard. Je kunt hier je merkbeheer en productbeheer uitvoeren.
                    </p>
                </div>

                <div class="p-6 space-y-4">
                    <a href="{{ route('brands.index') }}"
                       class="inline-block bg-primary-600 hover:bg-primary-700 text-black font-semibold py-3 px-6 rounded-lg shadow-lg transform transition duration-200 hover:scale-105">
                        Bekijk Merken
                    </a>

                    @auth
                        @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
                            <a href="{{ route('products.index') }}"
                               class="inline-block bg-primary-600 hover:bg-primary-700 text-black font-semibold py-3 px-6 rounded-lg shadow-lg transform transition duration-200 hover:scale-105">
                                Bekijk Producten
                            </a>
                        @endif

                        @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
                            <a href="{{ route('products.create') }}"
                               class="inline-block bg-green-600 hover:bg-green-700 text-black font-semibold py-3 px-6 rounded-lg shadow-lg transform transition duration-200 hover:scale-105">
                                + Nieuw Product
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

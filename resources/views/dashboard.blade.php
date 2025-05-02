<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white shadow rounded-2xl p-8">
                <div class="mb-6 mt-6">
                    <h3 class="text-xl font-semibold text-gray-800">Welkom terug!</h3>
                    <p class="text-gray-600 mt-1">Je bent succesvol ingelogd. Kies een actie om verder te gaan.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('brands.index') }}"
                       class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-4 px-6 rounded-xl shadow transition">
                        📦 Merken beheren
                    </a>
                
                    @auth
                        @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
                            <a href="{{ route('products.index') }}"
                               class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-4 px-6 rounded-xl shadow transition">
                                🛒 Producten bekijken
                            </a>

                            <a href="{{ route('categories.index') }}"
                            class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-4 px-6 rounded-xl shadow transition">
                            📂 Categorieën bekijken
                         </a>
                
                            <a href="{{ route('products.create') }}"
                               class="flex items-center justify-center bg-green-100 hover:bg-green-200 text-green-800 font-semibold py-4 px-6 rounded-xl shadow transition">
                                ➕ Nieuw product toevoegen
                            </a>
                
                            <a href="{{ route('categories.create') }}"
                               class="flex items-center justify-center bg-blue-100 hover:bg-blue-200 text-blue-800 font-semibold py-4 px-6 rounded-xl shadow transition">
                                ➕ Nieuwe categorie toevoegen
                            </a>
                        @endif
                    @endauth
                </div>                
            </div>
        </div>
    </div>
</x-app-layout>

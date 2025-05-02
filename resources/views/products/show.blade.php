@extends('layouts.base')

@section('title', $product->name)

@section('content')
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8 mt-10">
        <!-- Titel -->
        <h1 class="text-3xl font-extrabold text-secondary-900 dark:text-white mb-6">
            {{ $product->name }}
        </h1>

        <!-- Afbeelding -->
        <img src="{{ asset('storage/' . $product->image_path) }}" 
             alt="{{ $product->name }}" 
             class="w-full h-64 object-cover rounded-lg mb-6 bg-gray-100">

        <!-- Beschrijving -->
        <p class="text-gray-600 dark:text-gray-300 mb-4">
            {{ $product->description }}
        </p>

        <!-- Details -->
        <div class="space-y-2 text-gray-800 dark:text-gray-200 mb-6">
            <p><strong>💶 Prijs:</strong> €{{ number_format($product->price, 2, ',', '.') }}</p>
            <p><strong>📦 Voorraad:</strong> {{ $product->stock }}</p>
            <p><strong>🏷️ Categorie:</strong> {{ $product->category->name }}</p>
            <p><strong>🏭 Merk:</strong> {{ $product->brand->name }}</p>
        </div>

        <!-- Actieknoppen -->
        @auth
            @if(in_array(auth()->user()->role, ['admin', 'verkoper']))
                <div class="flex space-x-4 mt-6">
                    <a href="{{ route('products.edit', $product) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-4 py-2 rounded-lg transition">
                        ✏️ Bewerken
                    </a>

                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                          onsubmit="return confirm('Weet je zeker dat je dit product wilt verwijderen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded-lg transition">
                            🗑️ Verwijderen
                        </button>
                    </form>
                </div>
            @endif
        @endauth

        <!-- Teruglink -->
        @auth
    <!-- Teruglink -->
        <div class="mt-6">
            <a href="{{ route('products.index') }}" 
            class="inline-flex items-center text-primary-600 hover:underline font-medium text-sm">
                ← Terug naar overzicht
            </a>
        </div>
    @endauth
    </div>
@endsection

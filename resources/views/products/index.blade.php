@extends('layouts.base')

@section('title', 'Producten')

@section('content')
<section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    <div class="mb-8 flex justify-between items-center">
        <h1 class="text-4xl font-extrabold text-gradient bg-gradient-to-r from-primary-500 to-secondary-500 bg-clip-text text-transparent">
            Producten
        </h1>

        <form action="{{ route('products.index') }}" method="GET" class="flex items-center space-x-4">
            <!-- Categorie Filter -->
            <div class="flex items-center space-x-2">
                <label for="category" class="font-semibold text-gray-700">Categorie:</label>
                <select name="category" id="category" class="border border-gray-300 p-2 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500">
                    <option value="">Alle Categorieën</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(request()->category == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg shadow-lg transition duration-300">
                Filter
            </button>
        </form>

        @auth
            @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
                <a href="{{ route('products.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow-lg transition duration-300">
                    + Nieuw Product
                </a>
            @endif
        @endauth
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 rounded-lg shadow border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    @if ($products->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="p-4 border rounded-lg shadow-lg bg-white hover:shadow-2xl transition duration-300">
                    <img src="{{ asset('storage/' . $product->image_path) }}" class="w-full h-48 object-cover mb-4 rounded-md" alt="{{ $product->name }}">
                    <h2 class="text-xl font-semibold text-secondary-800">{{ $product->name }}</h2>
                    <p class="text-gray-600 mb-2">{{ Str::limit($product->description, 100) }}</p>
                    <p class="text-primary-600 font-bold">€{{ number_format($product->price, 2, ',', '.') }}</p>

                    <div class="mt-4 space-x-2">
                        <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:underline">Bekijken</a>

                        @auth
                            @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
                                <a href="{{ route('products.edit', $product) }}" class="text-yellow-600 hover:underline">Bewerken</a>

                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Weet je het zeker?')" class="text-red-600 hover:underline">
                                        Verwijderen
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">Er zijn momenteel geen producten beschikbaar.</p>
    @endif
</section>
@endsection

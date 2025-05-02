@extends('layouts.base')

@section('title', 'Categorieën')

@section('content')
<section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    <div class="mb-8 flex justify-between items-center">
        <h1 class="text-4xl font-extrabold text-gradient bg-gradient-to-r from-primary-500 to-secondary-500 bg-clip-text text-transparent">
            Categorieën
        </h1>

        @auth
            @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
                <a href="{{ route('categories.create') }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow-lg transition duration-300">
                    + Nieuwe Categorie
                </a>
            @endif
        @endauth
    </div>

    @if (session('error'))
        <div class="mb-6 p-4 bg-red-100 text-red-800 dark:bg-red-200 dark:text-red-900 rounded-lg shadow border border-red-300">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 rounded-lg shadow border border-green-300">
            {{ session('success') }}
        </div>
    @endif


    @if ($categories->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($categories as $category)
                <div class="relative group rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 bg-white">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ $category->image_url ?? 'https://source.unsplash.com/random/600x600/?' . urlencode($category->name) }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                             alt="{{ $category->name }}">
                    </div>

                    <div class="p-4">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $category->name }}</h3>
                        <p class="text-sm text-gray-600 mb-4">{{ $category->description ?? 'Geen beschrijving' }}</p>

                        <a href="{{ route('products.byCategory', $category->id) }}"
                           class="text-primary-600 font-medium hover:underline">Bekijk collectie</a>

                        @auth
                            @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
                                <div class="mt-4 flex space-x-4">
                                    <a href="{{ route('categories.edit', $category) }}"
                                       class="text-sm text-blue-600 hover:underline font-medium">Bewerk</a>

                                    <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                          onsubmit="return confirm('Weet je zeker dat je deze categorie wilt verwijderen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-red-600 hover:underline font-medium">
                                            Verwijder
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">Er zijn momenteel geen categorieën beschikbaar.</p>
    @endif
</section>
@endsection

@extends('layouts.base')

@section('content')
<section class="py-16 px-6 max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-4xl font-bold text-secondary-800">Categorieën</h1>

        @auth
        @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
            <a href="{{ route('categories.create') }}"
               class="inline-block bg-primary-600 hover:bg-primary-700 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow transition">
                + Nieuwe Categorie
            </a>
        @endif
    @endauth
    

    </div>

    @if (session('error'))
        <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-md border border-red-200">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-md border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-8">
        @foreach($categories as $category)
            <div class="relative group rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 bg-white">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $category->image_url ?? 'https://source.unsplash.com/random/600x600/?'.urlencode($category->name) }}" 
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
</section>
@endsection

@extends('layouts.base')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <!-- Titel met decoratieve elementen -->
        <div class="text-center mb-16 relative">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 relative inline-block">
                <span class="relative z-10">Onze Categorieën</span>
                <span class="absolute -bottom-2 left-0 w-full h-2 bg-primary-300/40 z-0"></span>
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Ontdek onze uitgebreide collectie in verschillende categorieën</p>
        </div>

        <!-- Categorieën grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($categories as $category)
                <div class="relative group rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500">
                    <!-- Categorie afbeelding -->
                    <div class="h-64 overflow-hidden">
                        <img src="{{ $category->image_url ?? 'https://source.unsplash.com/random/600x600/?'.urlencode($category->name) }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                             alt="{{ $category->name }}">
                    </div>
                    
                    <!-- Gradient overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-gray-900/30 to-transparent"></div>
                    
                    <!-- Categorie inhoud -->
                    <div class="absolute bottom-0 left-0 p-6 w-full transition-all duration-500 group-hover:pb-8">
                        <h3 class="text-2xl font-bold text-white mb-2 drop-shadow-lg">{{ $category->name }}</h3>
                        <p class="text-gray-200 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                            {{ $category->description ?? 'Verken onze collectie' }}
                        </p>
                        
                        <!-- Verborgen knop die verschijnt bij hover -->
                        <div class="mt-4 opacity-0 group-hover:opacity-100 translate-y-4 group-hover:translate-y-0 transition-all duration-300 delay-150">
                            <a href="{{ route('products.byCategory', $category->id) }}" class="inline-flex items-center px-4 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition-colors">
                                Bekijk collectie
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Decoratief element -->
                    <div class="absolute top-4 right-4 w-12 h-12 bg-primary-500 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <span class="text-white font-bold text-sm">{{ $category->items_count ?? '0' }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Call-to-action onderaan -->
        <div class="mt-20 text-center">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Niet gevonden wat je zocht?</h2>
            <a href="#" class="inline-block px-8 py-3 bg-gradient-to-r from-primary-500 to-primary-600 text-white font-medium rounded-full shadow-lg hover:shadow-xl transition-all hover:scale-105">
                Contacteer ons
            </a>
        </div>
    </div>
@endsection

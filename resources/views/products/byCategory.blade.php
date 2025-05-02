@extends('layouts.base')

@section('title', "Producten in categorie: " . ($category->name ?? 'Onbekend'))

@section('content')
<section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    <div class="mb-8">
        <h1 class="text-4xl font-extrabold text-gradient bg-gradient-to-r from-primary-500 to-secondary-500 bg-clip-text text-transparent">
            Producten in categorie: {{ $category->name }}
        </h1>
    </div>

    @if ($producten->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($producten as $product)
                <div class="p-4 border rounded-lg shadow-lg bg-white hover:shadow-2xl transition duration-300">
                    <img src="{{ asset('storage/' . $product->image_path) }}"
                         class="w-full h-48 object-cover mb-4 rounded-md"
                         alt="{{ $product->name }}">

                    <h2 class="text-xl font-semibold text-secondary-800">{{ $product->name }}</h2>
                    <p class="text-gray-600 mb-2">{{ Str::limit($product->description, 100) }}</p>
                    <p class="text-primary-600 font-bold">€{{ number_format($product->price, 2, ',', '.') }}</p>

                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">Geen producten gevonden in deze categorie.</p>
    @endif
</section>
@endsection

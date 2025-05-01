@extends('layouts.base')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-6">Producten in categorie: {{ $category->name }}</h1>

        @if($producten->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($producten as $product)
                    <div class="p-4 border rounded shadow">
                        <img src="{{ $product->image_path }}" class="w-full h-48 object-cover mb-2" alt="{{ $product->name }}">
                        <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                        <p class="text-gray-600">{{ $product->description }}</p>
                        <p class="text-primary-600 font-bold mt-2">&euro; {{ number_format($product->price, 2, ',', '.') }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p>Geen producten gevonden in deze categorie.</p>
        @endif
    </div>
@endsection

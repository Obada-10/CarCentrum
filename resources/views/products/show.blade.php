@extends('layouts.base')

@section('title', $product->name)

@section('content')
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-2xl font-bold">{{ $product->name }}</h2>

        <div class="mt-4">
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-48 h-48 object-cover mb-4">
        </div>

        <p class="mt-2 text-gray-700">{{ $product->description }}</p>
        <p class="mt-2"><strong>Prijs:</strong> €{{ number_format($product->price, 2) }}</p>
        <p><strong>Voorraad:</strong> {{ $product->stock }}</p>
        <p><strong>Categorie:</strong> {{ $product->category->name }}</p>
        <p><strong>Merk:</strong> {{ $product->brand->name }}</p>

        <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline mt-4 inline-block">
            ← Terug naar overzicht
        </a>
    </div>
@endsection

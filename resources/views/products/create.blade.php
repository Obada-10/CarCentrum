@extends('layouts.base')

@section('title', 'Nieuw Product')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Nieuw Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded p-6 space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-semibold">Naam</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full border rounded p-2 mt-1" required>
            @error('name') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="description" class="block font-semibold">Beschrijving</label>
            <textarea name="description" class="w-full border rounded p-2 mt-1">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="price" class="block font-semibold">Prijs (€)</label>
            <input type="number" name="price" step="0.01" value="{{ old('price') }}" class="w-full border rounded p-2 mt-1" required>
        </div>

        <div>
            <label for="stock" class="block font-semibold">Voorraad</label>
            <input type="number" name="stock" value="{{ old('stock') }}" class="w-full border rounded p-2 mt-1" required>
        </div>

        <div>
            <label for="category_id" class="block font-semibold">Categorie</label>
            <select name="category_id" class="w-full border rounded p-2 mt-1">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="brand_id" class="block font-semibold">Merk</label>
            <select name="brand_id" class="w-full border rounded p-2 mt-1">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image" class="block font-semibold">Afbeelding</label>
            <input type="file" name="image" class="w-full border rounded p-2 mt-1">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Opslaan</button>
    </form>
@endsection

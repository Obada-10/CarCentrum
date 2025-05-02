@extends('layouts.base')

@section('title', 'Nieuw Product')

@section('content')
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8 mt-10">
        <h1 class="text-3xl font-extrabold text-secondary-900 dark:text-white mb-8">➕ Nieuw Product</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Naam -->
            <div>
                <label for="name" class="block font-semibold text-gray-700 dark:text-gray-300 mb-1">Naam</label>
                <input type="text" name="name" id="name"
                       value="{{ old('name') }}"
                       class="w-full rounded-xl border border-gray-300 dark:border-gray-600 p-3 focus:outline-none focus:ring-2 focus:ring-primary-500"
                       required>
                @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Beschrijving -->
            <div>
                <label for="description" class="block font-semibold text-gray-700 dark:text-gray-300 mb-1">Beschrijving</label>
                <textarea name="description"
                          class="w-full rounded-xl border border-gray-300 dark:border-gray-600 p-3 h-32 resize-none focus:outline-none focus:ring-2 focus:ring-primary-500">{{ old('description') }}</textarea>
            </div>

            <!-- Prijs -->
            <div>
                <label for="price" class="block font-semibold text-gray-700 dark:text-gray-300 mb-1">Prijs (€)</label>
                <input type="number" name="price" step="0.01"
                       value="{{ old('price') }}"
                       class="w-full rounded-xl border border-gray-300 dark:border-gray-600 p-3 focus:outline-none focus:ring-2 focus:ring-primary-500"
                       required>
            </div>

            <!-- Voorraad -->
            <div>
                <label for="stock" class="block font-semibold text-gray-700 dark:text-gray-300 mb-1">Voorraad</label>
                <input type="number" name="stock"
                       value="{{ old('stock') }}"
                       class="w-full rounded-xl border border-gray-300 dark:border-gray-600 p-3 focus:outline-none focus:ring-2 focus:ring-primary-500"
                       required>
            </div>

            <!-- Categorie -->
            <div>
                <label for="category_id" class="block font-semibold text-gray-700 dark:text-gray-300 mb-1">Categorie</label>
                <select name="category_id"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-600 p-3 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Merk -->
            <div>
                <label for="brand_id" class="block font-semibold text-gray-700 dark:text-gray-300 mb-1">Merk</label>
                <select name="brand_id"
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-600 p-3 focus:outline-none focus:ring-2 focus:ring-primary-500">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Afbeelding -->
            <div>
                <label for="image" class="block font-semibold text-gray-700 dark:text-gray-300 mb-1">Afbeelding</label>
                <input type="file" name="image"
                       class="text-gray-300 w-full rounded-xl border border-gray-300 dark:border-gray-600 p-3 focus:outline-none focus:ring-2 focus:ring-primary-500">
            </div>

            <!-- Actieknoppen -->
            <div class="flex justify-end space-x-4 pt-4">
                <a href="{{ route('products.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-2 rounded-xl transition">
                    Annuleren
                </a>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 font-semibold rounded-xl shadow">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
@endsection

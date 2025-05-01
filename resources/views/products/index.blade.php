@extends('layouts.base')

@section('title', 'Producten')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Producten</h1>

        <form action="{{ route('products.index') }}" method="GET" class="flex items-center space-x-4">
            <!-- Categorie Filter -->
            <div>
                <label for="category" class="font-semibold">Categorie:</label>
                <select name="category" id="category" class="border p-2 rounded">
                    <option value="">Alle Categorieën</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(request()->category == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Filter
            </button>
        </form>

        @auth
            @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
                <a href="{{ route('products.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    + Nieuw Product
                </a>
            @endif
        @endauth
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-700 font-medium">{{ session('success') }}</div>
    @endif

    <div class="bg-white shadow rounded p-4 overflow-auto">
        <table class="w-full table-auto text-left">
            <thead>
                <tr class="border-b">
                    <th class="p-2">Afbeelding</th>
                    <th class="p-2">Naam</th>
                    <th class="p-2">Prijs</th>
                    <th class="p-2">Voorraad</th>
                    <th class="p-2">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-t">
                        <td class="p-2"><img src="{{ asset('storage/' . $product->image_path) }}" class="h-16 w-16 object-cover"></td>
                        <td class="p-2">{{ $product->name }}</td>
                        <td class="p-2">€{{ number_format($product->price, 2) }}</td>
                        <td class="p-2">{{ $product->stock }}</td>
                        <td class="p-2 space-x-2">
                            <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:underline">Bekijken</a>

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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

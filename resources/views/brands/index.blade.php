@extends('layouts.base')

@section('content')
<section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-4xl font-extrabold tracking-tight bg-gradient-to-r from-primary-500 to-secondary-500 text-transparent bg-clip-text">
            Merken
        </h1>
        

        @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
            <a href="{{ route('brands.create') }}"
               class="inline-flex items-center bg-primary-600 hover:bg-primary-700 text-white text-sm font-semibold px-5 py-3 rounded-xl shadow transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                + Nieuw Merk
            </a>
        @endif
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 rounded-lg shadow border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <ul class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach($brands as $brand)
            <li class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 p-6 flex flex-col justify-between">
                <div class="flex items-center space-x-4 mb-4">
                    @if (Str::startsWith($brand->image, ['http://', 'https://']))
                        <img src="{{ $brand->image }}" alt="{{ $brand->name }}" class="w-24 h-24 object-contain rounded-md bg-gray-50">
                    @else
                        <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" class="w-24 h-24 object-contain rounded-md bg-gray-50">
                    @endif
                    <span class="text-xl font-semibold text-secondary-800 dark:text-white">{{ $brand->name }}</span>
                </div>

                @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
                    <div class="flex justify-end space-x-4 mt-4">
                        <a href="{{ route('brands.edit', $brand) }}"
                           class="text-sm text-primary-600 hover:underline font-medium">Bewerk</a>
                        <form action="{{ route('brands.destroy', $brand) }}" method="POST"
                              onsubmit="return confirm('Weet je zeker dat je dit merk wilt verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-sm text-red-600 hover:underline font-medium">Verwijder</button>
                        </form>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</section>
@endsection

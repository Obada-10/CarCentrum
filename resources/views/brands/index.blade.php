@extends('layouts.base')

@section('content')
<section class="py-16 px-6 max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-secondary-800">Merken</h1>

        @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
            <a href="{{ route('brands.create') }}"
               class="inline-block bg-primary-600 hover:bg-primary-700 text-white text-sm font-semibold px-6 py-3 rounded-lg shadow-md transition">
                + Nieuw Merk
            </a>
        @endif
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-md shadow-sm border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <ul class="space-y-8">
        @foreach($brands as $brand)
            <li class="flex justify-between items-center bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <div class="flex items-center space-x-6">
                    @if ($brand->image)
                        <img src="{{ asset('storage/' . $brand->image) }}" alt="Brand Image" class="w-16 h-16 object-cover rounded-full shadow-md">
                    @else
                        <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center">
                            <span class="text-white text-sm font-semibold">{{ strtoupper(substr($brand->name, 0, 1)) }}</span>
                        </div>
                    @endif

                    <span class="text-secondary-800 font-semibold text-xl">{{ $brand->name }}</span>
                </div>

                @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
                    <div class="flex space-x-6">
                        <a href="{{ route('brands.edit', $brand) }}" class="text-sm text-primary-600 hover:underline font-medium">
                            Bewerk
                        </a>
                        <form action="{{ route('brands.destroy', $brand) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit merk wilt verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:underline font-medium">
                                Verwijder
                            </button>
                        </form>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</section>
@endsection

@extends('layouts.base')

@section('content')
<section class="py-16 px-6 max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-secondary-800">Merken</h1>

        @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
            <a href="{{ route('brands.create') }}"
               class="inline-block bg-primary-600 hover:bg-primary-700 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow transition">
                + Nieuw Merk
            </a>
        @endif
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-md shadow-sm border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <ul class="space-y-4">
        @foreach($brands as $brand)
            <li class="flex justify-between items-center bg-white p-4 rounded-lg shadow hover:shadow-md transition">
                <span class="text-secondary-800 font-medium">{{ $brand->name }}</span>

                @if (in_array(auth()->user()->role, ['admin', 'verkoper']))
                    <div class="flex space-x-4">
                        <a href="{{ route('brands.edit', $brand) }}"
                           class="text-sm text-blue-600 hover:underline font-medium">
                            Bewerk
                        </a>
                        <form action="{{ route('brands.destroy', $brand) }}" method="POST"
                              onsubmit="return confirm('Weet je zeker dat je dit merk wilt verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-sm text-red-600 hover:underline font-medium">
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

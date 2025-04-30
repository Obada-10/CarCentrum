@extends('layouts.base')

@section('content')
<section class="py-16 px-6 max-w-xl mx-auto">
    <h1 class="text-3xl font-bold text-secondary-800 mb-8">Merk bewerken</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-md border border-red-200">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('brands.update', $brand) }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-secondary-700 mb-1">Naam</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $brand->name) }}"
                required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500"
            >
        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="bg-primary-600 hover:bg-primary-700 text-white font-semibold px-6 py-2 rounded-md shadow transition">
                Opslaan
            </button>
        </div>
    </form>
</section>
@endsection

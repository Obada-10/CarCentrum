@extends('layouts.base')

@section('content')
<section class="py-16 px-6 max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-secondary-800 mb-8">Nieuw Merk Toevoegen</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-md shadow-sm border border-red-200">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="space-y-2">
            <label for="name" class="block text-sm font-medium text-secondary-800">Naam:</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
        </div>

        <div class="space-y-2">
            <label for="image" class="block text-sm font-medium text-secondary-800">Afbeelding:</label>
            <input type="file" name="image" accept="image/*" class="w-full text-sm text-secondary-800 file:border file:rounded file:px-4 file:py-2 file:bg-primary-100 file:text-primary-700 hover:file:bg-primary-200">
        </div>

        <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-2 px-4 rounded-md shadow-lg transition">
            Opslaan
        </button>
    </form>
</section>
@endsection

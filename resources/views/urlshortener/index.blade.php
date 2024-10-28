@extends('layouts.layout')

@section('content')
    <div class="text-4xl mb-4 text-white font-light">URL Shortener</div>
        <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md">
            <form action="{{ route('urlshortener.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="url" class="block text-gray-700">Enter a URL to shorten:</label>
                    <input type="url" name="url" placeholder="https://example.com/long-url" class="w-full border-gray-300 border-2 rounded mt-1" required>
                    @error('url')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Shorten URL</button>
            </form>
        </div>
    </div>
@endsection
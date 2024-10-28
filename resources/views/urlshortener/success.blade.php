@extends('layouts.layout')

@section('content')
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md">
        <p class="text-center text-lg">Original URL:</p>
        <p class=" text-center text-lg mt-2 pb-4">{{ $shortUrl->original_url }}</p>

        <p class="text-center text-lg">Your shortened URL:</p>
        <a href="{{ $shortenedUrl }}" class="text-blue-500 text-center block mt-2">{{ $shortenedUrl }}</a>

        <a href="/" class="block text-center mt-6 text-blue-500">Shorten another URL</a>
    </div>
@endsection
